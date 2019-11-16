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
  Alert
} from 'react-native';
import bgImage from './images/2.jpg'
import logo from './images/logo.png';
import logo2 from './images/nav.png';
import Icon from 'react-native-vector-icons/Ionicons';
import {createStackNavigator} from 'react-navigation-stack';
import {createAppContainer} from 'react-navigation';
import FontA from 'react-native-vector-icons/FontAwesome5';
import { Header } from 'react-native-elements';
import Ver from './components/Ver'; 



const { width: WIDTH } = Dimensions.get('window');


class App extends Component
{
  constructor()
  {
    super()
    this.state = 
    {
      showPass : true,
      press : false,
      us:'',
      ps:'',
      
    }
  }
  showPass = () => {
    if(this.state.press == false)
    {
      this.setState({showPass:false,press:true})
    }
    else
    {
      this.setState({showPass:true,press:false})
    }
  }
  Login = () => 
  {
    const us = this.state.us
    const ps = this.state.ps
    if(us=='' || ps=='')
    {
      Alert.alert("¡Atención!",
      "Para continuar, complete todos los campos.");
    }
    else
    {
      Keyboard.dismiss();
      fetch(
        'http://resiliencemx.com/app/login.php',
        {
          method:'post',
          header:{
            'Accept':'application/json',
            'Content-type':'application/json'
          },
          body:JSON.stringify({
            us:us,
            ps:ps
          })
      })    
      .then((response) => response.json())
      .then((responseJson) => {
        if(responseJson!=0)
        {
          
          const { navigate } = this.props.navigation;
          const idEducador = responseJson.idEducador;
          const nombre = responseJson.nombre;
          const asignado = responseJson.asignado;
          const idEstudiante = responseJson.idEstudiante;

          console.log(responseJson.idEstudiante+' '+responseJson.asignado);
          Alert.alert("¡Bienvenido!","EdukApp te da la bienvenida: "+nombre);
          navigate('WelcomeWindow',{id:idEducador,nombre:nombre,asignado:asignado,idEstudiante:idEstudiante});
          this.setState({us:'',ps:''});
        }
        else
        {
          Alert.alert("¡Atención!","Verifique sus datos");
        }
      })
      .catch((error)=>{
        console.log(error);
      })
    }
  }

  static navigationOptions = ({ navigation }) => {
    return {
      header:null
    };
  };


  render()
  {
    return (
      <ImageBackground  style={styles.backgroundContainer}>
        <View style={styles.logoContainer} >
          <Text style={styles.logoText} >EdukApp</Text>
          <Image source={logo} style={styles.logo}/>
        </View>

        <View style={styles.inputContainter}>
          <Icon 
          style={styles.inputIcon}
          name="ios-person" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          style={styles.input}
          value={this.state.us}
          placeholder={'Usuario'} 
          onChangeText={us => this.setState({us})}
          placeholderTextColor={'rgba(255,255,255,0.7)'}
          underlineColorAndroid='transparent'></TextInput>
        </View>


        <View style={styles.inputContainter}>
          <Icon 
          style={styles.inputIcon}
          name="ios-lock" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          style={styles.input}
          value={this.state.ps}
          onChangeText={ps => this.setState({ps})}
          placeholder={'Contraseña'} 
          secureTextEntry={this.state.showPass}
          placeholderTextColor={'rgba(255,255,255,0.7)'}
          underlineColorAndroid='transparent'></TextInput>

          <TouchableOpacity style={styles.bntEye}
            onPress={this.showPass.bind(this)}>
            <Icon name={this.state.press == false ? "ios-eye" : "ios-eye-off"} size={26} color={'rgba(255,255,255,0.7)'}></Icon>
          </TouchableOpacity>
        </View>
        
        <TouchableOpacity style={styles.btnLogin}
          onPress={this.Login}>
          <Text style={styles.text}>Ingresar</Text>
          <Icon style={styles.loginIco} name="ios-log-in" size={26} color={'rgb(255,255,255)'}></Icon>

        </TouchableOpacity>
      </ImageBackground>
    );
  }  
}

class LogoTitleWelcome extends Component
{
  render() 
  {
    return (
      <Image source={logo2} style={stylesWelcome.logoWelcome}></Image>
    )
  };
}

class WelcomeWindow extends Component
{

  constructor(props)
  {
    super(props);
    this.state = 
    {
      idEducador:0
    }
  }
  static navigationOptions = ({ navigation }) => {
    return {
      header:null
    };
  };
  render()
  {
    const {navigation} = this.props;
    const idEducador = navigation.getParam('id');
    const nombre = navigation.getParam('nombre');
    const asignado = navigation.getParam('asignado');
    const idEstudiante = navigation.getParam('idEstudiante');
    // const direccion = navigation.getParam('direccion');
    // const telefono = navigation.getParam('telefono');
    // const email = navigation.getParam('email');
    // const ps = navigation.getParam('ps');
    return (
      <View>
        <Header
          statusBarProps={{ barStyle: 'light-content' }}
          centerComponent={{ text: {}, style: { color: '#fff',marginBottom:20,fontSize:20 } }}
          leftComponent={<LogoTitleWelcome />}
          containerStyle={{
            backgroundColor: '#2d3545',
            height:60
          }}
        />
        <View style={{ alignItems:'center'}}>
          <Text style={stylesWelcome.headerText}>{nombre}</Text>
        </View>
      <View>
        <Text style={stylesWelcome.textWelcome}>Menú principal</Text>
        {asignado ? <Text style={{margin:10,color:'#293546',fontSize:20,textAlign:'center'}}>CUENTA CON UN ALUMNO ASIGNADO</Text>
         : <Text style={{margin:10,fontSize:20,color:'#C61C1A',textAlign:'center'}}>NO TIENE ASIGNADO UN ALUMNO. CONTACTE A ADMINISTRACIÓN</Text>}
      </View>
        <View style={stylesWelcome.Scroll}>
            <View style={stylesWelcome.viewBotonPedidos}>
              <TouchableOpacity style={stylesWelcome.btnPedidos}
                  disabled={asignado ? false : true}
                  onPress={() => this.props.navigation.navigate('Ver',{id:idEducador})}>
                  <Text style={stylesWelcome.text}>Evaluar</Text>
                  <FontA style={stylesWelcome.pedidosIco} name="edit" size={45} color={'rgb(255,255,255)'}></FontA>
                  
              </TouchableOpacity>
            </View>
            
            <View style={stylesWelcome.viewBotonData}>
              <TouchableOpacity style={stylesWelcome.btnData}
                  disabled={asignado ? false : true} 
                  onPress={() => this.props.navigation.navigate('Cambiar',{id:idCliente,nombre:nombre,direccion:direccion,telefono:telefono,email:email,ps:ps})}>
                  <Text style={stylesWelcome.text}>Evidencias</Text>
                  <FontA style={stylesWelcome.loginIco} name="cloud-upload-alt" size={45} color={'rgb(255,255,255)'}></FontA>
              </TouchableOpacity>
            </View>
            <View style={stylesWelcome.viewBotonVer}>
              <TouchableOpacity style={stylesWelcome.btnVerPedidos}
                  disabled={asignado ? false : true}
                  onPress={() => this.props.navigation.navigate('Ver',{idEstudiante:idEstudiante,idEducador:idEducador})}>
                  <Text style={stylesWelcome.text}>Ver estudiante</Text>
                  <FontA style={stylesWelcome.loginIco} name="user-graduate" size={45} color={'rgb(255,255,255)'}></FontA>
              </TouchableOpacity>
            </View>
            <View style={stylesWelcome.viewBotonSalir}>
              <TouchableOpacity style={stylesWelcome.btnSalir}
                  onPress={() => this.props.navigation.navigate('Home')}>
                  <Text style={stylesWelcome.text}>Salir</Text>
                  <FontA style={stylesWelcome.loginIco} name="sign-out-alt" size={45} color={'rgb(255,255,255)'}></FontA>
              </TouchableOpacity>
            </View>
        </View>
      </View>
    );
  }
}
/**CIERRE WELCOME */


/**NAVIGATOR  */
const MainNavigator = createStackNavigator(
  {
    Home: {screen: App},
    WelcomeWindow: {screen: WelcomeWindow},
    Ver:{screen: Ver},
  },
  {
    initialRouteName: "Home"
  }
);
const Win = createAppContainer(MainNavigator);
export default Win;

const styles = StyleSheet.create({
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
    backgroundColor: '#2d3545'
  },
  logoContainer:
  {
    alignItems: 'center',
    marginBottom :30
  },
  logoText:
  {
    color: 'white',
    fontSize: 50,
    marginTop: 5,
    marginBottom:10,
    opacity: 0.8,
    fontFamily: 'Cochin'
  },
  logo:
  {
    width:200,
    height:200,
    marginBottom:40
  },
  input:
  {
    width: WIDTH -55,
    height:45,
    borderRadius: 25,
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
  btnLogin:
  {
    width: WIDTH -55,
    height:45,
    borderRadius: 25,
    fontSize:18,
    backgroundColor: '#1A4781',
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



//Estilos WelcomeWindow
const stylesWelcome = StyleSheet.create({
  viewBotonPedidos:
  {
    position: 'relative'
  },
  viewBotonSalir:
  {
    marginLeft:200,
    marginTop:-169
  },
  viewBotonData:
  {
    marginLeft:200,
    marginTop:-169, 
  },
  viewBotonVer:
  {
  },
  btnPedidos:
  {
    width: WIDTH -250,
    height:160,
    borderRadius: 15,
    fontSize:18,
    backgroundColor: '#5c6c6c',
    marginTop: 10,
    alignItems:'center',
  },
  btnData:
  {
    width: WIDTH -250,
    height:160,
    borderRadius: 15,
    fontSize:18,
    backgroundColor: '#656c86',
    marginTop: 10,
    alignItems:'center',
  },
  btnSalir:
  {
    width: WIDTH -250,
    height:160,
    borderRadius: 15,
    fontSize:18,
    backgroundColor: '#2d3545',
    marginTop: 10,
    alignItems:'center',
  },
  btnVerPedidos:
  {
    width: WIDTH -250,
    height:160,
    borderRadius: 15,
    fontSize:18,
    backgroundColor: '#7393bc',
    marginTop: 10,
    alignItems:'center',
  },
  headerText:
  {
    fontFamily:'sans-serif-light',
    marginTop:-40,
    color: 'white',
    fontSize:20,
    fontWeight: 'bold',
  },
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
    margin:25
  },
  text:
  {
    color: 'rgb(255,255,255)',
    fontSize:30,
    marginTop:40,
    fontFamily: 'sans-serif-condensed'
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
    marginTop:20,
    marginBottom:20,
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