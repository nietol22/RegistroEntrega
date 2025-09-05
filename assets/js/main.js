document.addEventListener("DOMContentLoaded", function(){

  function ajax(url, method="GET", data=null){
    const options = { method };
    if(data){
      if(data instanceof FormData){
        options.body = data;
      } else {
        options.body = new URLSearchParams(data);
        options.headers = { 'Content-Type': 'application/x-www-form-urlencoded' };
      }
    }
    return fetch(url, options).then(res => res.json());
  }

  // Guardar nuevo elemento
  const formElemento = document.querySelector("#formElemento");
  formElemento.addEventListener("submit", function(e){
    e.preventDefault();
    ajax("ajax/guardar_elemento.php","POST", new FormData(this))
      .then(res=>{
        if(res.status=="success"){
          alert("Elemento registrado correctamente");
          this.reset();
          tablaElementosAvisados.refresh();
        } else alert(res.message);
      });
  });

  // Tabla elementos avisados
  const tablaElementosAvisados = new DataTable("#tablaElementosAvisados", {
    ajax: { url: "ajax/listar_elementos_avisados.php", dataSrc: 'data' },
    columns:[
      {data:"id"},
      {data:"elemento"},
      {data:"area_cargo"},
      {data:"orden_servicio"},
      {data:"tecnico"},
      {data:"ultimo_aviso"},
      {data:null, render: d=>{
        return `<button class="btn btn-success btn-sm reiterar" data-id="${d.id}">Reiterar Aviso</button>
                <button class="btn btn-primary btn-sm retirar" data-id="${d.id}">Registrar Retiro</button>`;
      }}
    ],
    dom: 'Bfrtip',
    buttons: ['copyHtml5','excelHtml5','csvHtml5','print']
  });

  // Tabla retirados
  const tablaRetirados = new DataTable("#tablaRetirados", {
    ajax: { url: "ajax/listar_retirados.php", dataSrc:'data' },
    columns:[
      {data:"id"},
      {data:"fecha_retiro"},
      {data:"elemento"},
      {data:"area_cargo"},
      {data:"orden_servicio"},
      {data:"personal_retiro"}
    ],
    dom: 'Bfrtip',
    buttons: ['copyHtml5','excelHtml5','csvHtml5','print']
  });

  // Delegación de eventos
  document.querySelector("#tablaElementosAvisados tbody").addEventListener("click", function(e){
    const id = e.target.dataset.id;
    if(e.target.classList.contains("reiterar")){
      const personal_avisa = prompt("Personal que avisa:");
      const personal_recibe = prompt("Personal que recibe la llamada:");
      if(personal_avisa && personal_recibe){
        ajax("ajax/guardar_aviso.php","POST",{elemento_id:id, personal_avisa, personal_recibe})
          .then(res=>{ if(res.status=="success") tablaElementosAvisados.refresh(); });
      }
    }
    if(e.target.classList.contains("retirar")){
      const personal_retiro = prompt("Personal que retira:");
      if(personal_retiro){
        ajax("ajax/registrar_retiro.php","POST",{aviso_id:id, personal_retiro})
          .then(res=>{
            if(res.status=="success"){
              tablaElementosAvisados.refresh();
              tablaRetirados.refresh();
            }
          });
      }
    }
  });

});
