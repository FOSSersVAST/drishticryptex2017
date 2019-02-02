<div class="container">
  <center>
    <form id="answer-form">
      <div class="row">
        <div class="col-md-10">
          <input type="text" id="cryptux-answer" class="form-control" placeholder="Answer here" />
        </div>
        <div class="col-md-2">
          <button type="submit" class="form-control btn btn-default">Submit</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div id="checking" style="display: none;">Checking...</div>
          <div id="nope" style="display: none;">Nope, that's not the answer. Try again :)</div>
        </div>
      </div>
    </form>
  </center>
  <br/><br/>
</div>
<script>
window.onload = function() {
  $('#cryptux-answer').focus();
  $('#answer-form').on('submit', function(e) {
    e.preventDefault();

    $('#nope').hide();
    $('#checking').show();

    var ans = $('#cryptux-answer')
                .val()
                .replace(/\s/g, "")
                .toLowerCase();

    var xhr = new XMLHttpRequest();
    $.ajax({
      type: "GET",
      url: '/' + ans,
      xhr: function() {
        return xhr;
      },
      success: function(data, textStatus) {
        $('#checking').hide();
        var u = xhr.responseURL;
        var parser = document.createElement('a');
        parser.href = u;
        if (window.location.pathname != parser.pathname) {
          $('#nope').hide();
          window.location.reload();
        } else {
          $('#nope').show();
        }
      }
    });
  });
};
</script>
