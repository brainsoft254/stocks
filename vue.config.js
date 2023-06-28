
// vue.config.js

/**
 * @type {import('@vue/cli-service').ProjectOptions}
 */
 module.exports = {
    // options...
    apiUrl: process.env.NODE_ENV === 'production'
    ? "https://joedream.stocks.co.ke/"
    : "http://localhost:8000/"
  }