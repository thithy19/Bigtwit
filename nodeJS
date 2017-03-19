console.log('The bot is starting');

var Twit = require('twit');

var config = require('./config');
var T = new Twit(config);

var tweet={
    status: "#Enfinuntweet à partir de nodeJS"
}

T.post('statuses/update', tweet);
