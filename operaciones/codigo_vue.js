var url = "crud.php";

new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({ 
    search: '', //para el cuadro de búsqueda de datatables  
    snackbar: false, //para el mensaje del snackbar   
    textSnack: 'texto snackbar', //texto que se ve en el snackbar 
    dialog: false, //para que la ventana de dialogo o modal no aparezca automáticamente      
    //definimos los headers de la datatables  
    headers: [
      {
        text: 'ID',
        align: 'left',
        sortable: false,
        value: 'id',
      },
      { text: 'NOMBRE', value:'Nombre'},
      { text: 'HUMEDAD MIN', value:'HumMin'},
      { text: 'HUMEDAD OPT', value: 'HumOpt'},
      { text: 'HUMEDAD MAX', value: 'HumMax'},
      { text: 'ACCIONES', value: 'accion', sortable: false },
    ],
    cultivos: [], //definimos el array cultivos
    editedIndex: -1,
    editado: {
      id: '',
      Nombre: '',
      HumMin: '',
      HumOpt: '',
      HumMax: '',
    },
    defaultItem: {
      id: '',
      Nombre: '',
      HumMin: '',
      HumOpt: '',
      HumMax: '',
    },
  }),

  computed: {
    //Dependiendo si es Alta o Edición cambia el título del modal  
    formTitle () {
      //operadores condicionales "condición ? expr1 : expr2"
      // si <condicion> es true, devuelve <expr1>, de lo contrario devuelve <expr2>    
      return this.editedIndex === -1 ? 'Nuevo Registro' : 'Editar Registro'
    },
  },

  watch: {
    dialog (val) {
      val || this.cancelar()
    },
  },

  created () {
      this.listarcultivos()
  },

  methods: {      
     //PROCEDIMIENTOS para el CRUD  
    //Procedimiento Listar moviles  
    listarcultivos:function(){
        axios.post(url, {opcion:4}).then(response =>{
           this.cultivos = response.data;       
        });
    },          
    //Procedimiento Alta de moviles.
    altacultivo:function(){
        axios.post(url, {opcion:1, Nombre:this.Nombre, HumMin:this.HumMin, HumOpt:this.HumOpt, HumMax:this.HumMax }).then(response =>{
            this.listarcultivos();
        });        
         this.Nombre = "",
         this.HumMin = 0,
         this.HumOpt = 0,
         this.HumMax = 0
    },  
    //Procedimiento EDITAR.
    editarcultivos:function(id,Nombre,HumMin,HumOpt, HumMax){       
       axios.post(url, {opcion:2, id:id, Nombre:Nombre, HumMin: HumMin, HumOpt:HumOpt, HumMax:HumMax }).then(response =>{
          this.listarcultivos();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarcultivos:function(id){
        axios.post(url, {opcion:3, id:id}).then(response =>{           
            this.listarcultivos();
            });
    },             
    editar (item) {    
      this.editedIndex = this.cultivos.indexOf(item)
      this.editado = Object.assign({}, item)
      this.dialog = true
    },
    borrar (item) { 
      const index = this.cultivos.indexOf(item)
      
      console.log(this.cultivos[index].id) //capturo el id de la fila seleccionada 
        var r = confirm("¿Está seguro de borrar el registro?");
        if (r == true) {
        this.borrarcultivos(this.cultivos[index].id)    
        this.snackbar = true
        this.textSnack = 'Se eliminó el registro.'    
        } else {
        this.snackbar = true
        this.textSnack = 'Operación cancelada.'    
        }    
    },
    cancelar () {
      this.dialog = false
      this.editado = Object.assign({}, this.defaultItem)
      this.editedIndex = -1
    },
    guardar () {
      if (this.editedIndex > -1) {
          //Guarda en caso de Edición
        this.id=this.editado.id          
        this.Nombre=this.editado.Nombre
        this.HumMin=this.editado.HumMin
        this.HumOpt=this.editado.HumOpt
        this.HumMax=this.editado.HumMax
        this.snackbar = true
        this.textSnack = '¡Actualización Exitosa!'  
        this.editarcultivos(this.id,this.Nombre, this.HumMin, this.HumOpt, this.HumMax)  
      } else {
          //Guarda el registro en caso de Alta  
          if(this.editado.Nombre == "" || this.editado.HumMin == 0 || this.editado.HumOpt == 0 || this.editado.HumMax == 0){
          this.snackbar = true
          this.textSnack = 'Datos incompletos.'      
        }else{
          this.Nombre=this.editado.Nombre
          this.HumMin=this.editado.HumMin
          this.HumOpt=this.editado.HumOpt
          this.HumMax=this.editado.HumMax          
          this.snackbar = true
          this.textSnack = '¡Alta exitosa!'
          this.altacultivo()
        }       
      }
      this.cancelar()
    },
  },
});