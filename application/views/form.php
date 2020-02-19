<section>
    
    <div class="shadow-lg p-3 mb-5 bg-white rounded m-4">
    <legend>Registro de evaluación</legend>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label >Nombre del:</label>
            <input type="text" class="form-control" name="nombre" placeholder="EJEMPLO: CLEMENTE LANDA RODRIGUEZ">
            </div>
            <!--<div class="form-group col-md-3">
            <label >Sede</label>
            <select id="sede" class="form-control" name="sede">
                <option>Seleccione</option>
                <option value="1">Banderilla</option>
                <option value="2">Cosamaloapan</option>
                <option value="3">Tuxpan</option>
                <option value="4">Poza Rica</option>
                <option value="5">Veracruz</option>
            </select>
            </div>-->
            <div class="form-group col-md-3" id="niveles">
                <label >Nivel</label>
                <select class="form-control">
                    <option>Selecciones una sede</option>
                </select>
			</div>
            <div class="form-group col-md-3" id="modalidades">
                <label >Modalidad</label>
                <select id="modalidad" class="form-control">
                    <option>Selecciones una sede</option>
                </select>
            </div>
        </div>
        <div class="form-row">
			
            <div class="form-group col-md-3" id="carreras">
                <label >Carrera</label>
                <select id="carrera" class="form-control">
                    <option>Selecciones una modalidad</option>
                </select>
			</div>
            <div class="form-group col-md-3">
                <label for="">Grupo</label>
                <select id="" class="form-control">
                    <option selected>Seleccione</option>
                    <option>LAE 101</option>
                    <option>LAE 102</option>
                    <option>LAE 103</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="">Materia</label>
                <input type="text" name="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
            <label for="" class="font-weight-bold">Seleccione archivo en formato CSV</label>
            <input type="file" name="file" />
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    	</form>
    </div>
</section>