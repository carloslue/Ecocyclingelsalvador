<div class="box box-info padding-1">
    <div class="box-body">
        <input type="file" value="$ruta->imagen" id="files" name="imagen" />
        <br />
        <output id="list"></output>
       
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $ruta->titulo, ['class' => 'form-control' . ($errors->has('descripcion_rutas') ? ' is-invalid' : ''), 'placeholder' => 'titulo de Rutas']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_rutas') }}
            {{ Form::text('descripcion_rutas', $ruta->descripcion_rutas, ['class' => 'form-control' . ($errors->has('descripcion_rutas') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Rutas']) }}
            {!! $errors->first('descripcion_rutas', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo') }}
            {{ Form::number('costo', $ruta->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'costo de Rutas']) }}
            {!! $errors->first('costo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
           
             <select style="visibility: hidden" name="estado" id="$ruta->estado">
                    <option value="Abilitado">Activo</option>
                 </select>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>



<style>
    .thumb {
      height: 50px;
      border: 1px solid #000;
      margin: 10px 5px 0 0;
    }
  </style>


   
  <script>
        function archivo(evt) {
            var files = evt.target.files; // FileList object
       
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
              //Solo admitimos imágenes.
              if (!f.type.match('image.*')) {
                  continue;
              }
       
              var reader = new FileReader();
       
              reader.onload = (function(theFile) {
                  return function(e) {
                    // Insertamos la imagen
                   document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                  };
              })(f);
       
              reader.readAsDataURL(f);
            }
        }
       
        document.getElementById('files').addEventListener('change', archivo, false);
</script>