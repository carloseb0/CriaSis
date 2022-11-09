@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('js')

<script>
    function ConfirmaExclusao(id){
        swal.fire({
            title: 'Confirma a exclusão?', text: "Esta ação não poderá ser revertida!",
            type: 'warning', showCancelButton: true, confirmButtonColor: "#3085d6",
            concelButtonColor: '#d33', confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Cancelar!", closeOnConfirm: false,
        }).then(function(isConfirm) {
            if(isConfirm.value){
                $.get('/'+@yield('table-delete') + '/'+id+'/destroy', function(data){
                    if(data.status == 200){
                        swal.fire(
                            "Deletado!",
                            "Exclusão confirmada.",
                            "success"
                        ).then(function(){
                            window.location.reload();
                        })
                    }else{
                        swal.fire(
                            "Erro!",
                            "Ocorreram erros na exclusão, Contate um administrador!",
                            "error"
                        )
                    }
                })
            }           
        })
    }

    function ConfirmaExclusaoLote(id){
        swal.fire({
            title: 'Confirma a exclusão?', text: "Esta ação não poderá ser revertida!",
            type: 'warning', showCancelButton: true, confirmButtonColor: "#3085d6",
            concelButtonColor: '#d33', confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Cancelar!", closeOnConfirm: false,
        }).then(function(isConfirm) {
            if(isConfirm.value){
                $.get('/'+@yield('table-delete') + '/'+id+'/destroy', function(data){
                    if(data.status == 200){
                        swal.fire(
                            "Deletado!",
                            "Exclusão confirmada.",
                            "success"
                        ).then(function(){
                            window.location.reload();
                        })
                    }else{
                        swal.fire(
                            "Erro!",
                            "Impossivel Deletar este Lote (Animais Vinculados)",
                            "error"
                        )
                    }
                })
            }           
        })
    }
</script>
@stop