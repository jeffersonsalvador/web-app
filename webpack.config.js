const path = require('path');

module.exports = {
    entry: './src/index.js',

    output: {
        path: path.resolve('public/assets/js/'),
        filename: 'main.js'
    }
}