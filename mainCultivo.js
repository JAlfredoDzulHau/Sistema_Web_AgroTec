var url = "crudCultivo.php";

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
      /*{
        text: 'ID',
        align: 'left',
        sortable: false,
        value: 'cultivo_id',
      },*/
      { text: 'ACCIONES', value: 'accion', sortable: false },
      { text: 'NOMBRE', value:'Nombrec'},
      { text: 'TEMPERATURA MIN °C', value:'TempMin'},
      { text: 'TEMPERATURA MAX °C', value: 'TempMax'},
      { text: 'TEMPERATURA OPT °C', value: 'TempOpt'},
      { text: 'DIAS DE GERMINACIÓN', value:'diasGerm'},
      { text: 'GERMINACIÓN DIA/HORA', value: 'germDiaHora'},
      { text: 'GERMINACIÓN NOCHE/HORA', value: 'germNocheHora'},
      { text: '% HUMEDAD RELATIVA', value:'humRel'},
      { text: '% HUMEDAD MIN', value: 'humMin'},
      { text: '% HUMEDAD MAX', value: 'humMax'},
      { text: 'ÉPOCA DE SIEMBRA 01', value: 'epcS1Ciclo'},
      { text: 'ÉPOCA DE SIEMBRA 02', value: 'epcS2Ciclo'},
      { text: 'SEMILLA VARIEDAD 01', value: 'semVar01'},
      { text: 'SEMILLA VARIEDAD 02', value: 'semVar02'},
      { text: 'SEMILLA VARIEDAD 03', value: 'semVar03'},
      { text: 'SEMILLA VARIEDAD 04', value: 'semVar04'},
      { text: 'SEMILLA VARIEDAD 05', value: 'semVar05'},
      { text: 'SEMILLA VARIEDAD 06', value: 'semVar06'},
      { text: 'SEMILLA HIBRIDO 01', value: 'semHib01'},
      { text: 'SEMILLA HIBRIDO 02', value: 'semHib02'},
      { text: 'SEMILLA HIBRIDO 03', value: 'semHib03'},
      { text: 'SEMILLA HIBRIDO 04', value: 'semHib04'},
      { text: 'SEMILLA HIBRIDO 05', value: 'semHib05'},
      { text: 'SEMILLA HIBRIDO 06', value: 'semHib06'},
      { text: 'SEMILLA HIBRIDO 07', value: 'semHib07'},
      { text: 'SEMILLA HIBRIDO 08', value: 'semHib08'},
      { text: 'TEXTURA DEL SUELO', value: 'sPFTextura'},
      { text: 'ESTRUCTURA DEL SUELO', value: 'sPFEsctructura'},
      { text: 'GRANULOMETRO', value: 'sPFGranulometro'},
      { text: 'NITROGENO DEL SUELO', value: 'sPQNitrogeno'},
      { text: 'FOSFORO DEL SUELO', value: 'sPQFosforo'},
      { text: 'POTASIO DEL SUELO', value: 'sPQPotasio'},
      { text: 'CALCIO DEL SUELO', value: 'sPQCalcio'},
      { text: 'PH DEL SUELO', value: 'spQPH'},
      { text: 'PROPIEDAD MICROBIOLOGICA 01', value: 'sPM01'},
      { text: 'PROPIEDAD MICROBIOLOGICA 02', value: 'sPM02'},
    ],
    cultivos: [], //definimos el array cultivos
    editedIndex: -1,
    editado: {
      cultivo_id: '',
      Nombrec: '',
      TempMin: '',
      TempMax: '',
      TempOpt: '',
      diasGerm: '',
      germDiaHora: '',
      germNocheHora: '',
      humRel: '',
      humMin: '',
      humMax: '',
      epcS1Ciclo: '',
      epcS2Ciclo: '',
      semVar01: '',
      semVar02: '',
      semVar03: '',
      semVar04: '',
      semVar05: '',
      semVar06: '',
      semHib01: '',
      semHib02: '',
      semHib03: '',
      semHib04: '',
      semHib05: '',
      semHib06: '',
      semHib07: '',
      semHib08: '',
      sPFTextura: '',
      sPFEsctructura: '',
      sPFGranulometro: '',
      sPQNitrogeno: '',
      sPQFosforo: '',
      sPQPotasio: '',
      sPQCalcio: '',
      spQPH: '',
      sPM01: '',
      sPM02: '',
    },
    defaultItem: {
      cultivo_id: '',
      Nombrec: '',
      TempMin: '',
      TempMax: '',
      TempOpt: '',
      diasGerm: '',
      germDiaHora: '',
      germNocheHora: '',
      humRel: '',
      humMin: '',
      humMax: '',
      epcS1Ciclo: '',
      epcS2Ciclo: '',
      semVar01: '',
      semVar02: '',
      semVar03: '',
      semVar04: '',
      semVar05: '',
      semVar06: '',
      semHib01: '',
      semHib02: '',
      semHib03: '',
      semHib04: '',
      semHib05: '',
      semHib06: '',
      semHib07: '',
      semHib08: '',
      sPFTextura: '',
      sPFEsctructura: '',
      sPFGranulometro: '',
      sPQNitrogeno: '',
      sPQFosforo: '',
      sPQPotasio: '',
      sPQCalcio: '',
      spQPH: '',
      sPM01: '',
      sPM02: '',
    },
  }),

  computed: {
    //Dependiendo si es Alta o Edición cambia el título del modal  
    formTitle () {
      //operadores condicionales "condición ? expr1 : expr2"
      // si <condicion> es true, devuelve <expr1>, de lo contrario devuelve <expr2>    
      return this.editedIndex === -1 ? 'Nuevo Cultivo' : 'Editar Cultivo'
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
    //Procedimiento Listar terrenos  
    listarcultivos:function(){
        axios.post(url, {opcion:4}).then(response =>{
           this.cultivos = response.data;       
        });
    },          
    //Procedimiento Alta de terrenos.
    altacultivo:function(){
        axios.post(url, {opcion:1, Nombrec:this.Nombrec, TempMin:this.TempMin, TempMax:this.TempMax, TempOpt:this.TempOpt, diasGerm:this.diasGerm, germDiaHora:this.germDiaHora, germNocheHora:this.germNocheHora, humRel:this.humRel, humMin:this.humMin, humMax:this.humMax, epcS1Ciclo:this.epcS1Ciclo, epcS2Ciclo:this.epcS2Ciclo, semVar01:this.semVar01, semVar02:this.semVar02, semVar03:this.semVar03, semVar04:this.semVar04, semVar05:this.semVar05, semVar06:this.semVar06, semHib01:this.semHib01, semHib02:this.semHib02, semHib03:this.semHib03, semHib04:this.semHib04, semHib05:this.semHib05, semHib06:this.semHib06, semHib07:this.semHib07, semHib08:this.semHib08, sPFTextura:this.sPFTextura, sPFEsctructura:this.sPFEsctructura, sPFGranulometro:this.sPFGranulometro, sPQNitrogeno:this.sPQNitrogeno, sPQFosforo:this.sPQFosforo, sPQPotasio:this.sPQPotasio, sPQCalcio:this.sPQCalcio, spQPH:this.spQPH, sPM01:this.sPM01, sPM02:this.sPM02 }).then(response =>{
            this.listarcultivos();
        });        
        this.Nombrec = "",
        this.TempMin = 0,
        this.TempMax = 0,
        this.TempOpt = 0,
        this.diasGerm = "",
        this.germDiaHora = "",
        this.germNocheHora = "",
        this.humRel = 0,
        this.humMin = 0,
        this.humMax = 0,
        this.epcS1Ciclo = "",
        this.epcS2Ciclo = "",
        this.semVar01 = "",
        this.semVar02 = "",
        this.semVar03 = "",
        this.semVar04 = "",
        this.semVar05 = "",
        this.semVar06 = "",
        this.semHib01 = "",
        this.semHib02 = "",
        this.semHib03 = "",
        this.semHib04 = "",
        this.semHib05 = "",
        this.semHib06 = "",
        this.semHib07 = "",
        this.semHib08 = "",
        this.sPFTextura = "",
        this.sPFEsctructura = "",
        this.sPFGranulometro = "",
        this.sPQNitrogeno = "",
        this.sPQFosforo = "",
        this.sPQPotasio = "",
        this.sPQCalcio = "",
        this.spQPH = "",
        this.sPM01 = "",
        this.sPM02 = ""
    },  
    //Procedimiento EDITAR.
    editarcultivos:function(cultivo_id,Nombrec,TempMin,TempMax,TempOpt,diasGerm,germDiaHora,germNocheHora,humRel,humMin,humMax,epcS1Ciclo,epcS2Ciclo,semVar01,semVar02,semVar03,semVar04,semVar05,semVar06,semHib01,semHib02,semHib03,semHib04,semHib05,semHib06,semHib07,semHib08,sPFTextura,sPFEsctructura,sPFGranulometro,sPQNitrogeno,sPQFosforo,sPQPotasio,sPQCalcio,spQPH,sPM01,sPM02 ){       
       axios.post(url, {opcion:2, cultivo_id:cultivo_id, Nombrec:Nombrec, TempMin:TempMin, TempMax:TempMax, TempOpt:TempOpt, diasGerm:diasGerm, germDiaHora:germDiaHora, germNocheHora:germNocheHora, humRel:humRel, humMin:humMin, humMax:humMax, epcS1Ciclo:epcS1Ciclo, epcS2Ciclo:epcS2Ciclo, semVar01:semVar01, semVar02:semVar02, semVar03:semVar03, semVar04:semVar04, semVar05:semVar05, semVar06:semVar06, semHib01:semHib01, semHib02:semHib02, semHib03:semHib03, semHib04:semHib04, semHib05:semHib05, semHib06:semHib06, semHib07:semHib07, semHib08:semHib08, sPFTextura:sPFTextura, sPFEsctructura:sPFEsctructura, sPFGranulometro:sPFGranulometro, sPQNitrogeno:sPQNitrogeno, sPQFosforo:sPQFosforo, sPQPotasio:sPQPotasio, sPQCalcio:sPQCalcio, spQPH:spQPH, sPM01:sPM01, sPM02:sPM02 }).then(response =>{
          this.listarcultivos();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarcultivos:function(cultivo_id){
        axios.post(url, {opcion:3, cultivo_id:cultivo_id}).then(response =>{           
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
      
      console.log(this.cultivos[index].cultivo_id) //capturo el id de la fila seleccionada 
        var r = confirm("¿Está seguro de borrar el registro?");
        if (r == true) {
        this.borrarcultivos(this.cultivos[index].cultivo_id)    
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
        this.cultivo_id=this.editado.cultivo_id          
        this.Nombrec=this.editado.Nombrec
        this.TempMin=this.editado.TempMin
        this.TempMax=this.editado.TempMax
        this.TempOpt=this.editado.TempOpt
        this.diasGerm=this.editado.diasGerm
        this.germDiaHora=this.editado.germDiaHora
        this.germNocheHora=this.editado.germNocheHora
        this.humRel=this.editado.humRel
        this.humMin=this.editado.humMin
        this.humMax=this.editado.humMax
        this.epcS1Ciclo=this.editado.epcS1Ciclo
        this.epcS2Ciclo=this.editado.epcS2Ciclo
        this.semVar01=this.editado.semVar01
        this.semVar02=this.editado.semVar02
        this.semVar03=this.editado.semVar03
        this.semVar04=this.editado.semVar04
        this.semVar05=this.editado.semVar05
        this.semVar06=this.editado.semVar06
        this.semHib01=this.editado.semHib01
        this.semHib02=this.editado.semHib02
        this.semHib03=this.editado.semHib03
        this.semHib04=this.editado.semHib04
        this.semHib05=this.editado.semHib05
        this.semHib06=this.editado.semHib06
        this.semHib07=this.editado.semHib07
        this.semHib08=this.editado.semHib08
        this.sPFTextura=this.editado.sPFTextura
        this.sPFEsctructura=this.editado.sPFEsctructura
        this.sPFGranulometro=this.editado.sPFGranulometro
        this.sPQNitrogeno=this.editado.sPQNitrogeno
        this.sPQFosforo=this.editado.sPQFosforo
        this.sPQPotasio=this.editado.sPQPotasio
        this.sPQCalcio=this.editado.sPQCalcio
        this.spQPH=this.editado.spQPH
        this.sPM01=this.editado.sPM01
        this.sPM02=this.editado.sPM02
        this.snackbar = true
        this.textSnack = '¡Actualización Exitosa!'  
        this.editarcultivos(this.cultivo_id, this.Nombrec, this.TempMin, this.TempMax, this.TempOpt, this.diasGerm, this.germDiaHora, this.germNocheHora, this.humRel, this.humMin, this.humMax, this.epcS1Ciclo, this.epcS2Ciclo, this.semVar01, this.semVar02, this.semVar03, this.semVar04, this.semVar05, this.semVar06, this.semHib01, this.semHib02, this.semHib03, this.semHib04, this.semHib05, this.semHib06, this.semHib07, this.semHib08, this.sPFTextura, this.sPFEsctructura, this.sPFGranulometro, this.sPQNitrogeno, this.sPQFosforo, this.sPQPotasio, this.sPQCalcio, this.spQPH, this.sPM01, this.sPM02 )  
      } else {
          //Guarda el registro en caso de Alta  
          if(this.editado.Nombrec == "" || this.editado.TempMin == 0 || this.editado.TempMax == 0 || this.editado.TempOpt == 0 || this.editado.diasGerm == "" || this.editado.germDiaHora == "" || this.editado.germNocheHora == "" || this.editado.humRel == 0 || this.editado.humMin == 0 || this.editado.humMax == 0 || this.editado.epcS1Ciclo == "" || this.editado.epcS2Ciclo == null || this.editado.semVar01 == null || this.editado.semVar02 == null || this.editado.semVar03 == null || this.editado.semVar04 == null || this.editado.semVar05 == null || this.editado.semVar06 == null || this.editado.semHib01 == null || this.editado.semHib02 == null || this.editado.semHib03 == null || this.editado.semHib04 == null || this.editado.semHib05 == null || this.editado.semHib06 == null || this.editado.semHib07 == null || this.editado.semHib08 == null || this.editado.sPFTextura == null || this.editado.sPFEsctructura == null || this.editado.sPFGranulometro == null || this.editado.sPQNitrogeno == null || this.editado.sPQFosforo == null || this.editado.sPQPotasio == null || this.editado.sPQCalcio == null || this.editado.spQPH == null || this.editado.sPM01 == null || this.editado.sPM02 == null ){
          this.snackbar = true
          this.textSnack = 'Datos incompletos.'      
        }else{
          this.Nombrec=this.editado.Nombrec
          this.TempMin=this.editado.TempMin
          this.TempMax=this.editado.TempMax
          this.TempOpt=this.editado.TempOpt
          this.diasGerm=this.editado.diasGerm 
          this.germDiaHora=this.editado.germDiaHora
          this.germNocheHora=this.editado.germNocheHora
          this.humRel=this.editado.humRel
          this.humMin=this.editado.humMin
          this.humMax=this.editado.humMax
          this.epcS1Ciclo=this.editado.epcS1Ciclo
          this.epcS2Ciclo=this.editado.epcS2Ciclo
          this.semVar01=this.editado.semVar01
          this.semVar02=this.editado.semVar02
          this.semVar03=this.editado.semVar03
          this.semVar04=this.editado.semVar04
          this.semVar05=this.editado.semVar05
          this.semVar06=this.editado.semVar06
          this.semHib01=this.editado.semHib01
          this.semHib02=this.editado.semHib02
          this.semHib03=this.editado.semHib03
          this.semHib04=this.editado.semHib04
          this.semHib05=this.editado.semHib05
          this.semHib06=this.editado.semHib06
          this.semHib07=this.editado.semHib07
          this.semHib08=this.editado.semHib08
          this.sPFTextura=this.editado.sPFTextura
          this.sPFEsctructura=this.editado.sPFEsctructura
          this.sPFGranulometro=this.editado.sPFGranulometro
          this.sPQNitrogeno=this.editado.sPQNitrogeno
          this.sPQFosforo=this.editado.sPQFosforo
          this.sPQPotasio=this.editado.sPQPotasio
          this.sPQCalcio=this.editado.sPQCalcio
          this.spQPH=this.editado.spQPH
          this.sPM01=this.editado.sPM01
          this.sPM02=this.editado.sPM02  
          this.snackbar = true
          this.textSnack = '¡Alta exitosa!'
          this.altacultivo()
        }       
      }
      this.cancelar()
    },
  },
});