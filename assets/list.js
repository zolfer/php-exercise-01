$(function(){
  $('#todoInput').keypress(function(e) {
    if (e.which == 13) {
      const data = { value: e.target.value };
      $.post('/?q=add', data, function(rtn) {
          if (rtn == 'ok') {
            window.location.href = '/';
          }
        }
      );
    }
  });

  $('.jsDone').click(function(){
    const data = { value: $(this).data('id') };
    $.post('/?q=done', data, function(rtn) {
        if (rtn == 'ok') {
          window.location.href = '/';
        }
      }
    );
  });

  $('.jsRemove').click(function(){
    if (confirm("Você realmente deseja remover este item?")) {
      const data = { value: $(this).data('id') };
      $.post('/?q=del', data, function(rtn) {
          if (rtn == 'ok') {
            window.location.href = '/';
          }
        }
      );
    }
  });

  $('.jsHover').hover(function(){
    const id = $(this).data('id');
    $('#jsRemove_' + id).css('display', 'block');
  }, function(){
    const id = $(this).data('id');
    $('#jsRemove_' + id).css('display', 'none');
  });
});
