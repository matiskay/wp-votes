(function($){

/*@TODO: Remove BASE_PATH */
var BASE_PATH = 'http://127.0.0.1/wordpress/votes';

var WP_VOTES_API_URL = BASE_PATH + '/wp-content/plugins/wp-votes/api-set.php';
console.log(WP_VOTES_API_URL);

$('.votes').on('click', 'a', function(e){
  e.preventDefault();

  var $this = $(this);
  var id = $this.parent().data('postid');
  var voteTag = $this.data('votetag');

  var totalVotes = 0;

  console.log('id:   ' + id);
  console.log('vote_tag:   ' + voteTag);

  $.ajax({
    url : WP_VOTES_API_URL,
    data : { 'id' : id, 'vote_tag' : voteTag },
    type : 'post',
    datatype : 'json',
    cache : false,
    timeout: 8000,
    beforeSend : function() {
      console.log('beforeSend');
    },
    success : function(json) {

      if (voteTag === 'up') {
        upVotes($this.parent().find('.total-points'));
      } else if (voteTag === 'down') {
        downVotes($this.parent().find('.total-points'));
      }
      console.log(json);
    },
    error : function(result) {
      if (result.statusText != "abort") {
        console.log('Abort');
      }
    }
  });

});


var upVotes = function($element) {
  var totalVotes;
  totalVotes = parseInt($element.text());
  $element.text(totalVotes + 1);
};


var downVotes = function($element) {
  var totalVotes;
  totalVotes = parseInt($element.text());
  $element.text(totalVotes - 1);
};

var updateVotes = function(json) {
  console.log('updateVotes');
};

})(jQuery);
