<template>
   
   <div style="position: relative; top: 100px;">
    


<div class="container" >
    


<table>
    
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Roles</th>
            <th>Telefono</th>
            <th>Ubicacion</th>
            <th>Editar</th>
        </tr>
        <tbody>
           
            <tr>
                <td></td>
                <td>
                    <div class="switch">
    <label>
     Cliente
      <input checked="checked"  type="checkbox">
      <span class="lever"></span>
      Tienda
    </label>
  </div>
                  
                  

                    </td>
                <td></td>
                
                 
                    
                <td></td>
                    <td>#</td>
                    @endif
                
                <td><a href="#!" class="waves-effect waves-circle btn-floating secondary-content"><i class="material-icons">add</i></a></td>
            
            
            </tr>
        </tbody>
    </thead>


</table>


</div>

</div> 
  
</template>

<script>
export default {
  data() {
    return {
      usuarios: [],
      usuario: {nombre: '', descripcion: ''}
    }
  },
  created(){
    axios.get('/admin').then(res=>{
      console.log(res.data);
    })
  },
  
}
</script>
