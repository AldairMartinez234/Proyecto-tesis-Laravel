<div class="container">
    <form action="{{route('pacientes.huellas')}}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="buscador" tabindex="-1" role="dialog">
            <div class="modal-dialog" data-backdrop="static">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="container-fluid" style="margin: 0px 0;">
                            <div class="page-header">
                                <h3 class="text-center all-tittle">SISTEMA DE CONTROL DE OXIGENO MEDICINAL
                                    <br><small>Administración de pacientes</small></h3>
                            </div>
                        </div>
                        <div class="text-center all-tittle">Buscador de pacientes por huella</div>
                    </div>
                    <div class="modal-body">
                        <center>
                            <input type="hidden" id="id_paciente" name="id_paciente" value="">
                            <div class="">
                                <label>Nombre del paciente:</label>
                                <label id="nombre"></label>
                            </div>
                            <div id="fingerPrint" style="width: 38%;height: 290px;margin-top: 5px;">
                                <div style="display: block">
                                    <img id="token" src="{{asset('img/finger.png')}}"
                                        style="width: 80%;margin-left: 9%;">
                                </div>
                                <div style="display: block;padding-left: 3px;">
                                    <br>
                                    <textarea id="_texto" cols="40" rows="3">
                        ---
                </textarea>
                                </div>

                            </div>
                            <button type="submit" id="_status" class="btn btn-success"><i
                                    class="zmdi zmdi-floppy"></i></button>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span>Cerrar
                            </button>
                        </center>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>