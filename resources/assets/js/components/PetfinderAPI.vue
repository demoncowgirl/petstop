<template>
<div class="container">
    <div id="petSearchInput" class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Pet Search</h1>
                    <div class="form-group">
                        <label for="searchZip">ZipCode</label>
                        <input type="text" name="zipCode" value="" class="input-sm" placeholder="Zipcode Required" style="width: auto;" v-model='searchZip' required>

                        <label for="animal">Animal Type</label>
                        <select name="type" v-model='animalType'>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                            <option value="bird">Bird</option>
                            <option value="horse">Horse</option>s
                            <option value="barnyard">Barnyard</option>
                            <option value="reptile">Reptile</option>
                            <option value="smallfurry">Small Furry</option>
                        </select>

                        <label for="age">Age</label>
                        <select name="age" v-model='animalAge'>
                            <option value=''>Any</option>
                            <option value="Baby">Baby</option>
                            <option value="Young">Young</option>
                            <option value="Adult">Adult</option>
                            <option value="Senior">Senior</option>
                        </select>

                        <!-- todo: add approximate weight to size labels -->
                        <label for="size">Size</label>
                        <select name="size" v-model='animalSize'>
                            <option value=''>Any</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                        </select>

                        <label for="sex">Sex</label>
                        <select name="sex" v-model="animalSex">
                            <option value=''>Any</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                        <div>
                            <input class="btn btn-secondary" style="color: white;" type="submit" id="submitZip" @click="getPet(); showBtn();">
                            <input class="btn btn-secondary" value="Clear" style="color:white;" type="button" id="reloadForm" @click="reloadForm();">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div><strong><h4>Page Number {{pageNum}}</h4></strong></div>
    <div><strong><h4>Offset {{lastOffset}}</h4></strong></div>
    <div><strong><h4>Number of items {{ itemCount }} </h4></strong></div>
    <div><strong><h4>Remainder {{ remainder }} </h4></strong></div> -->
    <div id="petDisplay" class="container-fluid d-flex p-1 m-0">
        <div class="row">
            <div id="prev" class="col-md-1" style="display:none;">
                <button type="button" class="btn btn-sm" style="height: 100%;" id="prevBtn" @click="previousPage();">
                    <span class="arrow-icon"><i class="fas fa-arrow-circle-left fa-2x"></i></span>
                </button>
            </div>
            <div class="row col-md-10">
                <div id="frame" style="min-width: 210px;" class="col col-md-4" v-for="pet in displayArray" v-if="showOutput">
                    <div class="border border-dark p-2">
                        <div><strong>Name:</strong> {{ pet.name }}</div>
                        <div><strong>Location:</strong> {{ pet.city }}</div>
                        <div><strong>Age:</strong> {{ pet.animalAge }}</div>
                        <div><strong>Sex:</strong> {{ pet.animalSex }}</div>
                        <div><strong>Size:</strong> {{ pet.animalSize }}</div>
                        <div><strong>Breed:</strong> {{ pet.breed }}</div>
                        <div><strong>Contact Email:</strong> <a style="font-size: 13px" :href="'mailto:'+ pet.email">{{ pet.email }}</a></div>
                        <div><strong>Contact Phone:</strong> {{ pet.phone }}</div>
                        <img id="petImage" :src="pet.image" width="200" height="auto" class="image-responsive" />
                        <div class="m-2">{{ pet.description }}</div>
                        <div id="petOptions">
                            <i class="fas fa-paw fa-1x pr-1"></i>
                            <ul>
                                <li v-for="petOptions in newOptionsArray">{{ petOptions }}</li>
                            </ul>
                            <i class="fas fa-paw fa-1x pr-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div id="next" class="col-md-1" style="display:none;">
                <button type="button" class="btn btn-sm" style="height: 100%" id="nextBtn" @click="nextPage();">
                    <span class="arrow-icon"><i class="fas fa-arrow-circle-right fa-2x"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>
</template>s

<script>
export default {
    name: 'petfinderapi',
    mounted() {},
    data: function() {
        return {
            showOutput: false,
            output: 'basic',
            searchZip: '',
            petsArray: [],
            // option: '',
            newOptionsArray: [], // array of manipulated options from api
            animalType: '',
            animalSize: '',
            animalAge: '',
            animalSex: '',
            itemCount: 3,
            pageNum: 0,
            remainder: 0,
            // lastOffset: 0,
            prevBtn: '',
            nextBtn: '',
            showError: false,
            errorMsg: '<h1>There was an error. Please try again.</h1>',
            noMatchesFound: '<h1>Sorry, but we did not find any matches.<h1>',
            showStatus: true,
            fetchingStatus: '<h1>Fetching a list of potential new best friends...</h1>',
            apiRequest: null,
            apiKey: "Pzl6OrmbLxqQuKEejdrl2EBMrVfaYGoboHsw4e1zb8ztBRHL5u",
            apiSecret: "9EWRCDwHXJIAowYJ3xmRa438xDseehynjYsQQJMQ",
            data: '',
        }
    },

    methods: {
        getAuthToken: function() {

            //Get Auth Token
            var apiKey = "Pzl6OrmbLxqQuKEejdrl2EBMrVfaYGoboHsw4e1zb8ztBRHL5u";
            var apiSecret = "9EWRCDwHXJIAowYJ3xmRa438xDseehynjYsQQJMQ";

            fetch('https://api.petfinder.com/v2/oauth2/token', {
                method: 'POST',
                body: 'grant_type=client_credentials&client_id=' + apiKey + '&client_secret=' + apiSecret,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(resp) {
                // Return the response as JSON
                return resp.json();
            }).then(function(data) {
                // Log the API data
                console.log(data);
            }).catch(function(err) {
                // Log any errors
                console.log('something went wrong', err);
            });
        },

        getPet: function(location, data) {

            fetch('https://api.petfinder.com/v2/animals' + '?postcode = ' + zipCode + ' &status = ' + '
                adoptable ' + ' & type = ' + animalType + ' &
                age = ' + animalAge + ' & size = ' + animalSize + ' & gender = ' + animalSex, {
                headers: {
                    'Authorization': data.token_type + ' ' + data.access_token,
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Access-Control-Allow-Origin': 'no-cors',
                }
            }).then(function(resp) {

            // Return the response as JSON
            return resp.json();

        }).then(function(data) {

            // Log the API data
            console.log('token', data);

            // Return a second API call
            // This one uses the token we received for authentication
            return fetch('https://api.petfinder.com/v2/animals' + '&status=' + status, {
                headers: {
                    'Authorization': data.token_type + ' ' + data.access_token,
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Access-Control-Allow-Origin': 'no-cors'
                }
            }).then(function() {
                this.$url.get("https://api.petfinder.com/v2/animals");
            });

        }).then(function(resp) {

            // Return the API response as JSON
            return resp.json();

        }).then(function(data) {

            // Log the pet data
            console.log('pets', data);

        }).catch(function(err) {

            // Log any errors
            //    console.log('something went wrong', err);

        });

    },

    catchResponse: function(data) {

        var pets = data.petfinder.pets;
        var count = 3;
        var statusCode = data.petfinder.header.status.code.$t;
        // var lastOffset = data.petfinder.header.lastOffset.$t;
        // console.log(lastOffset);
        console.log(data);

        if (statusCode !== "100") {
            console.log('there was an error' + statusCode);
            this.showError = true;
            this.showStatus = false;
            this.showOutput = false;
        }

        for (var i = 0; i < pets.pet.length; i++) {
            var currentPet = [];

            if (pets.pet[i].status.$t === 'A') {
                // numberOfItemsViewed += numberOfItemsViewed;
                this.showError = false;
                this.showStatus = false;
                // used in search
                currentPet.animalType = pets.pet[i].animal.$t;
                currentPet.animalAge = pets.pet[i].age.$t;
                currentPet.animalSize = pets.pet[i].size.$t;
                currentPet.animalSex = pets.pet[i].sex.$t;
                // for response, not displayed
                currentPet.id = pets.pet[i].id.$t;
                currentPet.zipCode = pets.pet[i].contact.zip.$t;
                //for response, displayed
                currentPet.city = pets.pet[i].contact.city.$t;
                currentPet.name = pets.pet[i].name.$t;
                currentPet.description = pets.pet[i].description.$t;
                currentPet.email = pets.pet[i].contact.email.$t;
                currentPet.phone = pets.pet[i].contact.phone.$t;
                currentPet.breed = pets.pet[i].breeds.breed.$t;
                currentPet.image = pets.pet[i].media.photos.photo[3].$t;
                currentPet.showOutput = true;
            }

            if (pets.pet.mix === 'Yes' || pets.pet[i].breeds.breed.length > 0) {
                currentPet.breed = (pets.pet[i].breeds.breed[0].$t) + ' / ' + (pets.pet[i].breeds.breed[1].$t)
            } else {
                currentPet.breed = pets.pet[i].breeds.breed.$t;
            }

            if (currentPet.phone == undefined) {
                currentPet.phone = "N/A";
            }

            if (currentPet.email == undefined) {
                currentPet.email = "N/A";
            }

            if (currentPet.description == undefined) {
                currentPet.description = "N/A";
                console.log("N/A");
            }

            var obj = pets.pet[i].options.option;
            var optionsArray = [];
            var options = "";
            var optionsUpper = "";
            var petOptions = "";
            var newOptionsArray = [];

            if (obj !== undefined && obj.length !== undefined && Array.isArray(obj) && obj !== 0) {
                optionsArray = Object.values(obj);
                for (var key in optionsArray) {
                    options = (optionsArray[key].$t);
                    optionsUpper = options.charAt(0).toUpperCase() + options.substr(1);
                    petOptions = optionsUpper.replace(/([A-Z])/g, ' $1').trim();
                    newOptionsArray.push(petOptions);
                }
            } else {
                currentPet.options = "N/A";
            }

            // if(pets.pet[i].media.photos.photo[i] == undefined){
            //   console.log('no photo available');
            //    this.showError = true;
            //    this.showStatus = false;
            //    this.showOutput = false;S
            //  }

            // retrieves first image if there are multiple images
            var petImage = "http://photos.petfinder.com/v2/photos/pets/<currentPet.id>";
            petImage = petImage.replace("http", "https");
            petImage = petImage.replace("<currentPet.id>", currentPet.id);


            if (currentPet.image === null) {
                petImage = "images/imgnotfound.jpg";
                console.log("there is no image");
            }

            this.newOptionsArray = newOptionsArray;
            this.petsArray.push(Object.assign({}, currentPet));
            this.showOutput = true;
        }
    },

    // hides next and previous buttons until submit button is clicked
    showBtn: function() {
        document.getElementById('prev').style.display = "block";
        document.getElementById('next').style.display = "block";
    },

    displayOptions: function() {
        var x = document.getElementById("petOptions");
        if (this.animalType == 'bird' || this.animalType == 'reptile' || this.animalType == 'smallfurry') {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    },

    nextPage: function() {
        if (this.pageNum * 3 < this.petsArray.length) {
            this.pageNum += 1;
            this.itemCount = (this.pageNum * 3) + 3;
            this.remainder = (this.itemCount % this.petsArray.length);

        }
        console.log(this.itemCount + " divided by " + this.petsArray.length + " = a remainder of " + this.remainder);
        if (this.remainder >= 24) {
            console.log('there is a remainder less than 3');

        }
    },
    previousPage: function() {
        if (this.pageNum > 0) {
            this.pageNum -= 1;
            this.itemCount -= 3;
            this.remainder = this.petsArray.length % this.itemCount;
        }
    },
    reloadForm: function() {
        window.location.reload(true);
    }
},
computed: {
    displayArray: function() {
        return this.petsArray.slice(this.pageNum * 3, (this.pageNum * 3) + 3);
    }
},
}
</script>
