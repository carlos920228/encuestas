<section>
    
    <div class="shadow-lg p-3 mb-5 bg-white rounded m-4">
    <legend>Registro de evaluación</legend>
    <hr>
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url()?>/evaluación/">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label >Nombre del Maestro</label>
            <input type="text" class="form-control" name="nombre" placeholder="EJEMPLO: CLEMENTE LANDA RODRIGUEZ">
            </div>
            <div class="form-group col-md-3" id="niveles">
                <label >Nivel</label>
                <select id="nivel" class="form-control">
                    <option selected>Seleccione</option>
                    <option value="1">Licenciatura</option>
                    <option value="2">Maestría</option>
                    <option value="3">Doctorado</option>
                </select>
			</div>
            <div class="form-group col-md-3" id="modalidades">
                <label >Modalidad</label>
                <select id="modalidad" class="form-control" name="modalidad">
                    <option selected>Seleccione</option>
                    <option value="Escolarizado">Escolarizado</option>
                    <option value="Mixto">Mixto</option>
                    <option value="Blended">Blended</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3" id="carreras">
                <label >Carrera</label>
                <select id="carrera" class="form-control">
                    <option selected>Seleccione un nivel</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="">Grupo</label>
                <input type="text" class="form-control" name="grupo" placeholder="EJEMPLO: 101" value="">
            </div>
            <div class="form-group col-md-3">
                <label for="">Materia</label>
                <input type="text" class="form-control" name="Materia" placeholder="EJEMPLO: 101" value="">
            </div>
            <div class="form-group col-md-3">
                <label for="" class="font-weight-bold">Seleccione archivo en formato CSV</label>
                <input type="file" name="file" />
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    	</form>
    </div>
</section>