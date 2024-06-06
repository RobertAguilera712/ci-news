    $('#nombre').keyup(function(){
        $('#accordion').html('');
        var text =$('#nombre').val();
        $.post(base_url+"centro-documental/ByNombre",
        {texto : text},
        function (data){
            var obj=JSON.parse(data);
            var output= "";
            $.each(obj,function(i,item){
                output+=
                '<div class="card">'+
                '<div class="card-header" id="headingOne">'+
                    '<h5 class="mb-0">'+
                        '<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"'+
                            'aria-expanded="true" aria-controls="collapseOne">'+
                           item.nombre
                        '</button>'+
                    '</h5>'+
                    '</div>'+

                '<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">'+
                    '<div class="card-body">'+
                        '<div class="row">'+
                            '<div class="col-md-6">'+
                           ' </div>'+
                           '<div class="col-md-6">'+
                                '<div class=row>'+
                                    '<h1 class="text-primary">'+
                                        item.descripcionTema
                                        '</h1>'+
                                '</div>'+
                                '<div class=row>'+
                                    item.año
                                '</div>'+
                                '<div class=row style="margin-top:15px">'+
                                   item.descripcion
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
            '</div>';
            });
            $('#accordion').append(output);
        });
    });