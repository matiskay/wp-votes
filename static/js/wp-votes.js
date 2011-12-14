(function($){

/*@TODO: Remove BASE_PATH */
var BASE_PATH = 'http://127.0.0.1/wordpress/votes';

var WP_VOTES_API_URL = BASE_PATH + '/wp-content/plugins/wp-votes/api-set.php';
console.log(WP_VOTES_API_URL);

$('.votes').on('click', 'a', function(e){
  e.preventDefault();

  var $this = $(this);
  var id = $this.parent().data('postid');
  var vote_tag = $this.data('votetag');

  console.log('id:   ' + id);
  console.log('vote_tag:   ' + vote_tag);

  $.ajax({
    url : WP_VOTES_API_URL,
    data : { 'id' : id, 'vote_tag' : vote_tag },
    type : 'post',
    datatype : 'json',
    cache : false,
    timeout: 8000,
    beforeSend : function() {
      console.log('beforeSend');
    },
    success : function(json) {
      console.log(json);
    },
    error : function(result) {
      if (result.statusText != "abort") {
        console.log('Abort');
      }
    }
  });

});



var updateVotes = function(json) {
  console.log('updateVotes');
};

})(jQuery);
