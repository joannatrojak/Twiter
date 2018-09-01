function getTweets(){
    $.get("http://localhost/Twitter/rest/rest.php/tweet", function(data){
        var tweetList = data.success; 
        tweetList.forEach(function(singleTweet){
            addTweetToTable(singleTweet);
        });
    });
}
function getTweetsByUserId(){
    var id = document.querySelector('#tweetList').getAttribute('data-id');
    $.get("http://localhost/Twitter/rest/rest.php/tweet/" + id, function(data){
        var tweetList = data.success; 
        tweetList.forEach(function(singleTweet){
            addTweetToTable(singleTweet);
        });
    });
}
function addTweetToTable(singleTweet){
    var newTweet = '<th>'+singleTweet.userId+'</th>'+
            '<tr><td>'+singleTweet.text+'</td></tr>'+
            '<tr><td>'+singleTweet.creationDate+'</td></tr>';
    
    var table = document.querySelector('#tweetList'); 
    table.innerHTML += newTweet;
}
getTweets();
getTweetsByUserId();



