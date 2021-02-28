const webpack = require("webpack");

process.env.NODE_ENV = process.env.NODE_ENV || "development";

module.exports = {
  configureWebpack: config => {
    if (process.env.NODE_ENV === 'production') {
        require("dotenv").config({ path: ".env.development" });
    } else {

    }
  }
}
