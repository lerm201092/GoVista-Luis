$("#buscar").focus();
$("#li-pacientes").addClass("active");

function filtro_estado(aux){
    $(".activeItem").removeClass("d-none"); 
    $(".inactiveItem").removeClass("d-none"); 
    if(aux=="I"){
        $(".activeItem").addClass("d-none"); 
    }else if(aux=="A"){
        $(".inactiveItem").addClass("d-none"); 
    }
}