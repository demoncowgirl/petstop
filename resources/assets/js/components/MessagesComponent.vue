

<template>

<div class="comments-app">

   <h1>Comments</h1>

   <!-- From -->

   <div class="comment-form" v-if="user">

       <!-- Comment Avatar -->

       <div class="comment-avatar">

           <img src="storage/commentbox.png">

       </div>



       <form class="form" name="form">

           <div class="form-row">

               <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>

               <span class="input" v-if="errorComment" style="color:red">{{errorComment}}</span>

           </div>



           <div class="form-row">

               <input class="input" placeholder="Email" type="text" disabled :value="user.name">

           </div>



           <div class="form-row">

               <input type="button" class="btn btn-success" @click="saveComment" value="Add Comment">

           </div>

       </form>

   </div>

   <div class="comment-form" v-else>

       <!-- Comment Avatar -->

       <div class="comment-avatar">

           <img src="storage/commentbox.png">

       </div>

       <form class="form" name="form">

           <div class="form-row">

               <a href="login"><textarea

                 class="input"

                 placeholder="Add comment..."

                 required></textarea></a>

           </div>

       </form>

   </div>

   <!-- Comments List -->

   <div class="comments" v-if="comments" v-for="(comment,index) in commentsData">

       <!-- Comment -->

       <div v-if="!spamComments[index] || !comment.spam" class="comment">

           <!-- Comment Avatar -->

           <div class="comment-avatar">

               <img src="storage/comment.png">

           </div>



           <!-- Comment Box -->

           <div class="comment-box">

               <div class="comment-text">{{comment.comment}}</div>

               <div class="comment-footer">

                   <div class="comment-info">

                       <span class="comment-author">

                               <em>{{ comment.name}}</em>

                           </span>

                       <span class="comment-date">{{ comment.date}}</span>

                   </div>



                   <div class="comment-actions">

                       <ul class="list">

                           <li>Votes: {{comment.votes}}

                               <a v-if="!comment.votedByUser" v-on:click="voteComment(comment.commentid,'directcomment',index,0,'up')">Up Votes</a>

                               <a v-if="!comment.votedByUser" v-on:click="voteComment(comment.commentid,'directcomment',index,0,'down')">Down Votes</a>

                           </li>

                           <li>

                               <a v-on:click="spamComment(comment.commentId,'directcomment',index,0)">Spam</a>

                           </li>

                           <li>

                               <a v-on:click="openComment(index)">Reply</a>

                           </li>

                       </ul>

                   </div>

               </div>

           </div>

           <!-- From -->

           <div class="comment-form comment-v" v-if="commentBoxs[index]">

               <!-- Comment Avatar -->

               <div class="comment-avatar">

                   <img src="storage/comment.png">

               </div>



               <form class="form" name="form">

                   <div class="form-row">

                       <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>

                       <span class="input" v-if="errorReply" style="color:red">{{errorReply}}</span>

                   </div>



                   <div class="form-row">

                       <input class="input" placeholder="Email" type="text" :value="user.name">

                   </div>



                   <div class="form-row">

                       <input type="button" class="btn btn-success" v-on:click="replyComment(comment.commentid,index)" value="Add Comment">

                   </div>

               </form>

           </div>

           <!-- Comment - Reply -->

           <div v-if="comment.replies">

               <div class="comments" v-for="(replies,index2) in comment.replies">

                   <div v-if="!spamCommentsReply[index2] || !replies.spam" class="comment reply">



                       <!-- Comment Avatar -->

                       <div class="comment-avatar">

                           <img src="storage/comment.png">

                       </div>



                       <!-- Comment Box -->

                       <div class="comment-box" style="background: grey;">

                           <div class="comment-text" style="color: white">{{replies.comment}}</div>

                           <div class="comment-footer">

                               <div class="comment-info">

                                   <span class="comment-author">

                                           {{replies.name}}

                                       </span>

                                   <span class="comment-date">{{replies.date}}</span>

                               </div>



                               <div class="comment-actions">

                                   <ul class="list">

                                       <li>Total votes: {{replies.votes}}

                                           <a v-if="!replies.votedByUser" v-on:click="voteComment(replies.commentid,'replycomment',index,index2,'up')">Up Votes</a>

                                           <a v-if="!replies.votedByUser" v-on:click="voteComment(comment.commentid,'replycomment',index,index2,'down')">Down Votes</a>

                                           </a>

                                       </li>

                                       <li>

                                           <a v-on:click="spamComment(replies.commentid,'replycomment',index,index2)">Spam</a>

                                       </li>

                                       <li>

                                           <a v-on:click="replyCommentBox(index2)">Reply</a>

                                       </li>

                                   </ul>

                               </div>

                           </div>

                       </div>

                       <!-- From -->

                       <div class="comment-form reply" v-if="replyCommentBoxs[index2]">

                           <!-- Comment Avatar -->

                           <div class="comment-avatar">

                               <img src="storage/comment.png">

                           </div>



                           <form class="form" name="form">

                               <div class="form-row">

                                   <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>

                                   <span class="input" v-if="errorReply" style="color:red">{{errorReply}}</span>

                               </div>



                               <div class="form-row">

                                   <input class="input" placeholder="Email" type="text" :value="user.name">

                               </div>



                               <div class="form-row">

                                   <input type="button" class="btn btn-success" v-on:click="replyComment(comment.commentid,index)" value="Add Comment">

                               </div>

                           </form>

                       </div>



                   </div>

               </div>

           </div>

       </div>

   </div>

</div>



</template>
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
101
102
103
104
105
106
107
108
109
110
111
112
113
114
115
116
117
118
119
120
121
122
123
124
125
126
127
128
129
130
131
132
133
134
135
136
137
138
139
140
141
142
143
144
145
146
147
148
149
150
151
152
153
154
155
156
157
158
159
160
161
162
163
164
165
166
167
168
169
170
171
172
173
174
175
176
177
178
179
180
181
182
183
184
185
186
187
188
189
190
191
192
193
194
195
196
197
198
199
200
201
202
203
204
205
206
207
208
209
210
211
212
213
214
215
216
217
218
219
220
221
222
223
224
225
226
227
228
229
230
231
232
233
234
235
236
237
238
239
240
241
242
243
244
245
246
247
248
249
250
251
252
253
254
255
256
257
258
259
260
261
262
263
264
265
266
267
268
269
270
271
272
273
274
275
276
277
278
279
280
281
282
283
284
285
286
287
288
289
290
291
292
293
294
295
296
297
298
299
300
301
302
303
304
305
306
307
308
309
310
311
312
313
314
315
316
317
318
319
320
321
322
323
324
325
326
327
328
329
330
331
<template>

<div class="comments-app">

   <h1>Comments</h1>

   <!-- From -->

   <div class="comment-form" v-if="user">

       <!-- Comment Avatar -->

       <div class="comment-avatar">

           <img src="storage/commentbox.png">

       </div>



       <form class="form" name="form">

           <div class="form-row">

               <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>

               <span class="input" v-if="errorComment" style="color:red">{{errorComment}}</span>

           </div>



           <div class="form-row">

               <input class="input" placeholder="Email" type="text" disabled :value="user.name">

           </div>



           <div class="form-row">

               <input type="button" class="btn btn-success" @click="saveComment" value="Add Comment">

           </div>

       </form>

   </div>

   <div class="comment-form" v-else>

       <!-- Comment Avatar -->

       <div class="comment-avatar">

           <img src="storage/commentbox.png">

       </div>

       <form class="form" name="form">

           <div class="form-row">

               <a href="login"><textarea

                 class="input"

                 placeholder="Add comment..."

                 required></textarea></a>

           </div>

       </form>

   </div>

   <!-- Comments List -->

   <div class="comments" v-if="comments" v-for="(comment,index) in commentsData">

       <!-- Comment -->

       <div v-if="!spamComments[index] || !comment.spam" class="comment">

           <!-- Comment Avatar -->

           <div class="comment-avatar">

               <img src="storage/comment.png">

           </div>



           <!-- Comment Box -->

           <div class="comment-box">

               <div class="comment-text">{{comment.comment}}</div>

               <div class="comment-footer">

                   <div class="comment-info">

                       <span class="comment-author">

                               <em>{{ comment.name}}</em>

                           </span>

                       <span class="comment-date">{{ comment.date}}</span>

                   </div>



                   <div class="comment-actions">

                       <ul class="list">

                           <li>Votes: {{comment.votes}}

                               <a v-if="!comment.votedByUser" v-on:click="voteComment(comment.commentid,'directcomment',index,0,'up')">Up Votes</a>

                               <a v-if="!comment.votedByUser" v-on:click="voteComment(comment.commentid,'directcomment',index,0,'down')">Down Votes</a>

                           </li>

                           <li>

                               <a v-on:click="spamComment(comment.commentId,'directcomment',index,0)">Spam</a>

                           </li>

                           <li>

                               <a v-on:click="openComment(index)">Reply</a>

                           </li>

                       </ul>

                   </div>

               </div>

           </div>

           <!-- From -->

           <div class="comment-form comment-v" v-if="commentBoxs[index]">

               <!-- Comment Avatar -->

               <div class="comment-avatar">

                   <img src="storage/comment.png">

               </div>



               <form class="form" name="form">

                   <div class="form-row">

                       <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>

                       <span class="input" v-if="errorReply" style="color:red">{{errorReply}}</span>

                   </div>



                   <div class="form-row">

                       <input class="input" placeholder="Email" type="text" :value="user.name">

                   </div>



                   <div class="form-row">

                       <input type="button" class="btn btn-success" v-on:click="replyComment(comment.commentid,index)" value="Add Comment">

                   </div>

               </form>

           </div>

           <!-- Comment - Reply -->

           <div v-if="comment.replies">

               <div class="comments" v-for="(replies,index2) in comment.replies">

                   <div v-if="!spamCommentsReply[index2] || !replies.spam" class="comment reply">



                       <!-- Comment Avatar -->

                       <div class="comment-avatar">

                           <img src="storage/comment.png">

                       </div>



                       <!-- Comment Box -->

                       <div class="comment-box" style="background: grey;">

                           <div class="comment-text" style="color: white">{{replies.comment}}</div>

                           <div class="comment-footer">

                               <div class="comment-info">

                                   <span class="comment-author">

                                           {{replies.name}}

                                       </span>

                                   <span class="comment-date">{{replies.date}}</span>

                               </div>



                               <div class="comment-actions">

                                   <ul class="list">

                                       <li>Total votes: {{replies.votes}}

                                           <a v-if="!replies.votedByUser" v-on:click="voteComment(replies.commentid,'replycomment',index,index2,'up')">Up Votes</a>

                                           <a v-if="!replies.votedByUser" v-on:click="voteComment(comment.commentid,'replycomment',index,index2,'down')">Down Votes</a>

                                           </a>

                                       </li>

                                       <li>

                                           <a v-on:click="spamComment(replies.commentid,'replycomment',index,index2)">Spam</a>

                                       </li>

                                       <li>

                                           <a v-on:click="replyCommentBox(index2)">Reply</a>

                                       </li>

                                   </ul>

                               </div>

                           </div>

                       </div>

                       <!-- From -->

                       <div class="comment-form reply" v-if="replyCommentBoxs[index2]">

                           <!-- Comment Avatar -->

                           <div class="comment-avatar">

                               <img src="storage/comment.png">

                           </div>



                           <form class="form" name="form">

                               <div class="form-row">

                                   <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>

                                   <span class="input" v-if="errorReply" style="color:red">{{errorReply}}</span>

                               </div>



                               <div class="form-row">

                                   <input class="input" placeholder="Email" type="text" :value="user.name">

                               </div>



                               <div class="form-row">

                                   <input type="button" class="btn btn-success" v-on:click="replyComment(comment.commentid,index)" value="Add Comment">

                               </div>

                           </form>

                       </div>



                   </div>

               </div>

           </div>

       </div>

   </div>

</div>



</template>

<script>
export default {

   props: ['commentUrl'],

   data() {

       return {

           comments: [],

           commentreplies: [],

           comments: 0,

           commentBoxs: [],

           message: null,

           replyCommentBoxs: [],

           commentsData: [],

           viewcomment: [],

           show: [],

           spamCommentsReply: [],

           spamComments: [],

           errorComment: null,

           errorReply: null,

           user: window.user

       }

   },

   http: {

       headers: {

           'X-CSRF-TOKEN': window.csrf

       }

   },

   methods: {

       fetchComments() {

           this.$http.get('comments/' + this.commentUrl).then(res => {



               this.commentData = res.data;

               this.commentsData = _.orderBy(res.data, ['votes'], ['desc']);

               this.comments = 1;

           });



       },

       showComments(index) {

           if (!this.viewcomment[index]) {

               Vue.set(this.show, index, "hide");

               Vue.set(this.viewcomment, index, 1);

           } else {

               Vue.set(this.show, index, "view");

               Vue.set(this.viewcomment, index, 0);

           }

       },

       openComment(index) {

           if (this.user) {

               if (this.commentBoxs[index]) {

                   Vue.set(this.commentBoxs, index, 0);

               } else {

                   Vue.set(this.commentBoxs, index, 1);

               }

           }

       },

       replyCommentBox(index) {

           if (this.user) {

               if (this.replyCommentBoxs[index]) {

                   Vue.set(this.replyCommentBoxs, index, 0);

               } else {

                   Vue.set(this.replyCommentBoxs, index, 1);

               }

           }

       },

       saveComment() {

           if (this.message != null && this.message != ' ') {

               this.errorComment = null;

               this.$http.post('comments', {

                   page_id: this.commentUrl,

                   comment: this.message,

                   users_id: this.user.id

               }).then(res => {



                   if (res.data.status) {

                       this.commentsData.push({ "commentid": res.data.commentId, "name": this.user.name, "comment": this.message, "votes": 0, "reply": 0, "replies": [] });

                       this.message = null;

                   }



               });

           } else {

               this.errorComment = "Please enter a comment to save";

           }

       },

       replyComment(commentId, index) {

           if (this.message != null && this.message != ' ') {

               this.errorReply = null;

               this.$http.post('comments', {

                   comment: this.message,

                   users_id: this.user.id,

                   reply_id: commentId

               }).then(res => {



                   if (res.data.status) {

                       if (!this.commentsData[index].reply) {

                           this.commentsData[index].replies.push({ "commentid": res.data.commentId, "name": this.user.name, "comment": this.message, "votes": 0 });

                           this.commentsData[index].reply = 1;

                           Vue.set(this.replyCommentBoxs, index, 0);

                           Vue.set(this.commentBoxs, index, 0);

                       } else {

                           this.commentsData[index].replies.push({ "commentid": res.data.commentId, "name": this.user.name, "comment": this.message, "votes": 0 });

                           Vue.set(this.replyCommentBoxs, index, 0);

                           Vue.set(this.commentBoxs, index, 0);

                       }

                       this.message = null;

                   }



               });

           } else {

               this.errorReply = "Please enter a comment to save";

           }

       },

       voteComment(commentId, commentType, index, index2, voteType) {

           if (this.user) {

               this.$http.post('comments/' + commentId + '/vote', {

                   users_id: this.user.id,

                   vote: voteType

               }).then(res => {

                   if (res.data) {

                       if (commentType == 'directcomment') {

                           if (voteType == 'up') {

                               this.commentsData[index].votes++;

                           } else if (voteType == 'down') {

                               this.commentsData[index].votes--;

                           }

                       } else if (commentType == 'replycomment') {

                           if (voteType == 'up') {

                               this.commentsData[index].replies[index2].votes++;

                           } else if (voteType == 'down') {

                               this.commentsData[index].replies[index2].votes--;

                           }

                       }

                   }



               });

           }

       },

       spamComment(commentId, commentType, index, index2) {

           console.log("spam here");

           if (this.user) {

               this.$http.post('comments/' + commentId + '/spam', {

                   users_id: this.user.id,

               }).then(res => {

                   if (commentType == 'directcomment') {

                       Vue.set(this.spamComments, index, 1);

                       Vue.set(this.viewcomment, index, 1);

                   } else if (commentType == 'replycomment') {

                       Vue.set(this.spamCommentsReply, index2, 1);

                   }

               });



           }


 
       },

   },

   mounted() {

      console.log("mounted");

      this.fetchComments();

   }



}

</script>
