function rellenarSelect(val){
	
    $.ajax({
      url: 'ajax/miscript.php?id_departament0=' + val,
      onError: function(error){
         console.log('error');
      },
      onSuccess: function(response){
          $('#select2').html(response);
      }
    })
}