$("#li-pacientes").addClass("active");
$(".mat-input").focus(function(){
  $(this).parent().addClass("is-active is-completed");
});

$(".mat-input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("is-completed");
    $(this).parent().removeClass("is-active");
  })

  $("#tabs-ver .nav-item").click(function(){
      $("#tabs-ver .nav-item .nav-link .text-tab").addClass('d-none');
      $(this).children('.nav-link').children('.text-tab').removeClass('d-none')
  });

  function onchange_dpto(dpto_cmb){
      var sel_dpto      = dpto_cmb.attr("id");
      var dpto_zona     = dpto_cmb.val();
      var sel_municipio = dpto_cmb.attr("munid_cmb"), sel_municipio = $("#"+sel_municipio);

      sel_municipio.html("");
      sel_municipio.append("<option value='0'>- Escoja un municipio -</option>");
      $.ajax({
          type: 'GET',
          url: "{!!URL::to('/Areas/municipios')!!}",
          data: {'dpto_zona': dpto_zona},
          success: function (data) {
              $.each(data, function (i, json) {
                  sel_municipio.append("<option value='"+json.id+"'>"+json.nomarea+"</option>");
              });                      
          }
      });
  }