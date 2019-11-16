import React, {Fragment, Component} from 'react';
import {
  StyleSheet,
  View,
  Text,
  Image,
  ImageBackground,
  TextInput,
  Dimensions,
  TouchableOpacity,
  Keyboard,
  Alert,
  ScrollView
} from 'react-native';
import {createStackNavigator} from 'react-navigation-stack';
import {createAppContainer} from 'react-navigation';
import logo from '../images/nav.png';
import Icon from 'react-native-vector-icons/Ionicons';
const { width: WIDTH } = Dimensions.get('window');
import { Header } from 'react-native-elements';
import Lista from './ListaPedidos';
import { Card } from 'react-native-elements';


/**CLASE WELCOME WINDOW */


class LogoTitleWelcome extends Component
{
  render() 
  {
    return (
      <Image source={logo} style={stylesWelcome.logoWelcome}></Image>
    )
  };
}



class Pedir extends Component
{

  constructor(props)
  {
    super(props)
    this.state = 
    {
      data:[],
      nombre:'',
      calle:'',
      numInt:'',
      numExt:'',
      colFracc: '',
      cp:'',
    }
  }
  componentDidMount()
  {
    const {navigation} = this.props;
    const idEducador = navigation.getParam('idEducador');
    const idEstudiante = navigation.getParam('idEstudiante');
    fetch(
      'http://resiliencemx.com/app/dataEst.php',
      {
        method:'post',
        header:{
          'Accept':'application/json',
          'Content-type':'application/json'
        },
        body:JSON.stringify({
          idEducador:idEducador,
          idEstudiante:idEstudiante
        })
    })    
    .then((response) => response.json())
    .then((responseJson) => 
    {
        var array = JSON.stringify(responseJson);
        console.log(JSON.stringify(responseJson));
        // const { navigate } = this.props.navigation;
        // const idEducador = responseJson.idEducador;
        // const nombre = responseJson.nombre;
        // const asignado = responseJson.asignado;
        // const idEstudiante = responseJson.idEstudiante;
        this.setState({data:array,nombre:responseJson.nombre,calle:responseJson.calle,numInt:responseJson.numInt,numExt:responseJson.numExt,cp:responseJson.cp,colFracc:responseJson.colFracc});
        //navigate('WelcomeWindow',{id:idEducador,nombre:nombre,asignado:asignado,idEstudiante:idEstudiante});
      
    })
    .catch((error)=>{
      console.log(error);
    })
  } 


  static navigationOptions = ({ navigation }) => {
    return {
      title: 'Información estudiante',
      headerStyle: {
        backgroundColor: '#2d3545',
      },
      headerTintColor: '#fff',
      headerTitleStyle: {
        fontWeight: 'bold',
      },
    };
  };
  render()
  {
    const {navigation} = this.props;
    const idEducador = navigation.getParam('idEducador');
    const idEstudiante = navigation.getParam('idEstudiante'); 
    const {data} = this.state;
    
    return (
      <View style={stylesWelcome.backgroundImage}>
        <View>
          <Text style={stylesWelcome.textWelcome}>Información del estudiante</Text>
          <Card>
            <View key={this.state.data.idEstudiante} style={styles.user}>
              <Text style={{fontSize:20,textAlign:'center'}}>Nombre: {this.state.nombre}</Text>
            </View>
          </Card>
          <Text style={stylesWelcome.textWelcome2}>Dirección</Text>
          <Card>
            <View key={this.state.data.idEstudiante} style={styles.user}>
              <Text style={{fontSize:20,textAlign:'center'}}>Calle {this.state.calle}</Text>
            </View>
          </Card>
          <Card>
            <View key={this.state.data.idEstudiante} style={styles.user}>
              <Text style={{fontSize:20,textAlign:'center'}}>#Int {this.state.numInt}</Text>
            </View>
          </Card>
          <Card>
            <View key={this.state.data.idEstudiante} style={styles.user}>
              <Text style={{fontSize:20,textAlign:'center'}}>#Ext {this.state.numExt}</Text>
            </View>
          </Card>
          <Card>
            <View key={this.state.data.idEstudiante} style={styles.user}>
              <Text style={{fontSize:20,textAlign:'center'}}>Colonia/Fracc {this.state.colFracc}</Text>
            </View>
          </Card>
          <Card>
            <View key={this.state.data.idEstudiante} style={styles.user}>
              <Text style={{fontSize:20,textAlign:'center'}}>C.P. {this.state.cp}</Text>
            </View>
          </Card>
        </View>
      </View>
    );
  }
}
/**CIERRE WELCOME */





export default Pedir;



//Estilos HOME
const styles = StyleSheet.create({
  registroText:
  {
    marginTop:50,
    marginBottom:10,
    alignItems: 'center'
  },
  bntEye:{
    position: 'absolute',    
    top:7,
    right:37

  },
  loginIco:{
    position: 'absolute',    
    top:7,
    right:120
  },
  registroIco:{
    position: 'absolute',    
    top:7,
    left:190
  },
  inputContainter:{
    marginTop:10,
    marginBottom:20
  },
  backgroundContainer:
  {
    flex: 1,
    width: null,
    height: null,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#2A050A'
  },
  logoContainer:
  {
    alignItems: 'center'
  },
  logoText:
  {
    color: 'white',
    fontSize: 17.5,
    fontWeight: '500',
    opacity: 0.9,
  },
  logo:
  {
    width:270,
    height:270,
    marginBottom:15
  },
  input:
  {
    width: WIDTH -55,
    height:45,
    borderRadius: 15,
    fontSize:20,
    paddingLeft: 45,
    backgroundColor: 'rgba(0,0,0,0.35)',
    color: 'rgba(255,255,255,0.7)',
    marginHorizontal: 25

  },
  inputIcon:
  {
    position: 'absolute',
    top: 8,
    left: 37
  },
  btnRegistro:
  {
    width: WIDTH -185,
    height:40,
    borderRadius: 5,
    fontSize:18,
    backgroundColor: 'white',
    marginTop: 10
  },
  textBtnReg:
  {
    color: 'black',
    fontSize:20,
    textAlign: 'center',
    marginTop:7,
    fontStyle: 'italic'
  },
  btnLogin:
  {
    width: WIDTH -55,
    height:45,
    borderRadius: 15,
    fontSize:18,
    backgroundColor: '#0A194F',
    marginTop: 10
  },
  text:
  {
    color: 'rgba(255,255,255,0.7)',
    fontSize:20,
    textAlign: 'center',
    marginTop:7
  }
});
/**Cierre HOME */



//Estilos WelcomeWindow
const stylesWelcome = StyleSheet.create({
    headerTitle: {
      color: '#fff',
      fontSize: 15,
      fontWeight: 'bold',
      marginRight: 8,
    },
    logoWelcome:
    {
      width:50,
      height:50,
      marginBottom:24
    },
    Scroll:
    {
      margin:20
    },
    text:
    {
      color: 'rgba(255,255,255,0.7)',
      fontSize:20,
      textAlign: 'center',
      marginTop:7
    },
    loginIco:{
      position: 'absolute',    
      top:7,
      right:120
  
    },
    backgroundImage:
    {
      flex: 1,
      justifyContent: 'center',
      alignItems: 'center'
    },
    textWelcome:
    {
      fontSize: 30,
      margin:5,
      fontWeight:'500',
      textAlign: 'center'
    },
    textWelcome2:
    {
      fontSize: 24,
      margin:5,
      fontWeight:'500',
      textAlign: 'center'
    },
    btnCont:
    {
      width: WIDTH -55,
      height:45,
      borderRadius: 25,
      fontSize:18,
      backgroundColor: '#1A4781',
      marginTop: 10,
      marginBottom:20
    },
  });