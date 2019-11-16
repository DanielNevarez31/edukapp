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
import {createStackNavigator, createAppContainer, NavigationEvents, createDrawerNavigator} from 'react-navigation';
import logo from '../images/pizza.png';
import Icon from 'react-native-vector-icons/Ionicons';
const { width: WIDTH } = Dimensions.get('window');
import firebase from '../Firebase';
import bgImage from '../images/3.jpg';

/**Clase REGISTER */
class Register extends Component
{
  constructor(props)
  {
    super(props);  
    this.unsubscribe = null;
    this.ref = firebase.firestore().collection('clientes');
    this.state = 
    {
      showPass : true,
      press : false,
      email:'',
      ps:'',
      nombre: '',
      telefono:'',
      direccion:''
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
  onChange = (e) => {
    const state = this.state
    state[e.target.name] = e.target.value;
    this.setState(state);
    console.log(state);
  }
  componentWillUnmount() {
    this._isMounted = false;
  }
  Login = () => 
  {
    const {nombre,direccion,telefono,ps,email} = this.state;
    if(email=='' || ps=='' || direccion == '' || nombre=='' || telefono=='')
    {
      Alert.alert("¡Atención!",
      "Para terminar el registro, llene todos los campos.");
    }
    else
    {
      const { navigate } = this.props.navigation;
      const clientes=[];
      Keyboard.dismiss();
      this.ref.add({
        nombre,
        direccion,
        telefono,
        email,
        ps
      }).then((docRef) => {
        this.setState({
          nombre: '',
          direccion: '',
          telefono: '',
          ps: '',
          email: ''
        });
        this._isMounted = true;
        Alert.alert("¡Éxito!",'El registro ha finalizado');
        navigate('Home');
      })
      .catch((error) => {
        console.error("Error adding document: ", error);
        Alert.alert("¡Atención!",'Algo salió mal. Inténtelo de nuevo.');
      });
    }
  }

  static navigationOptions = ({ navigation }) => {
    return {
      title: 'Registro',
      headerStyle: {
        backgroundColor: '#2A050A',
      },
      headerTintColor: '#fff',
      headerTitleStyle: {
        fontWeight: 'bold',
      },
    };
  };
  render()
  {
    return (
      <ImageBackground  style={stylesRegistro.backgroundContainer}>
        <View style={stylesRegistro.logoContainer} >
            <Image source={logo} style={stylesRegistro.logo}></Image>
          <Text style={stylesRegistro.logoText}>Registro</Text>  
          <Text style={stylesRegistro.logoSubText}>Ingrese sus datos</Text>        
        </View>

        <View style={stylesRegistro.inputContainter}>
          <Icon 
          style={stylesRegistro.inputIcon}
          name="ios-person" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          style={stylesRegistro.input}
          placeholder={'Nombre completo'} 
          onChangeText={nombre => this.setState({nombre})}
          returnKeyType={"next"}
          keyboardType={"default"}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          onSubmitEditing={(event) => {this.refs.SecondInput.focus();}}
          underlineColorAndroid='transparent'></TextInput>
        </View>

        <View style={stylesRegistro.inputContainter}>
          <Icon 
          style={stylesRegistro.inputIcon}
          name="ios-pin" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          ref='SecondInput'
          style={stylesRegistro.input}
          placeholder={'Dirección'} 
          onChangeText={direccion => this.setState({direccion})}
          returnKeyType={"next"}
          keyboardType={"default"}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          onSubmitEditing={(event) => {this.refs.ThirdInput.focus();}}
          underlineColorAndroid='transparent'></TextInput>
        </View>

        <View style={stylesRegistro.inputContainter}>
          <Icon 
          style={stylesRegistro.inputIcon}
          name="ios-call" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          ref='ThirdInput'
          style={stylesRegistro.input}
          placeholder={'Teléfono'} 
          onChangeText={telefono => this.setState({telefono})}
          returnKeyType={"next"}
          keyboardType={"numeric"}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          onSubmitEditing={(event) => {this.refs.ForthInput.focus();}}
          underlineColorAndroid='transparent'></TextInput>
        </View>

        <View style={stylesRegistro.inputContainter}>
          <Icon 
          style={stylesRegistro.inputIcon}
          name="ios-mail" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          ref='ForthInput'
          style={stylesRegistro.input}
          placeholder={'Email'} 
          onChangeText={email => this.setState({email})}
          returnKeyType={"next"}
          keyboardType={"email-address"}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          onSubmitEditing={(event) => {this.refs.FifthInput.focus();}}
          underlineColorAndroid='transparent'></TextInput>
        </View>


        <View style={stylesRegistro.inputContainter}>
          <Icon 
          style={stylesRegistro.inputIcon}
          name="ios-lock" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          ref='FifthInput'
          keyboardType={"numeric"}
          returnKeyType={"done"}
          style={stylesRegistro.input}
          onChangeText={ps => this.setState({ps})}
          placeholder={'Contraseña'} 
          secureTextEntry={this.state.showPass}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          underlineColorAndroid='transparent'></TextInput>
          <TouchableOpacity style={stylesRegistro.bntEye}
            onPress={this.showPass.bind(this)}>
            <Icon name={this.state.press == false ? "ios-eye" : "ios-eye-off"} size={26} color={'rgba(255,255,255,0.7)'}></Icon>
          </TouchableOpacity>
        </View>
        
        <TouchableOpacity style={stylesRegistro.btnLogin}
          onPress={this.Login}>
          <Text style={stylesRegistro.text}>Ingresar</Text>
          <Icon style={stylesRegistro.loginIco} name="ios-log-in" size={26} color={'rgb(255,255,255)'}></Icon>

        </TouchableOpacity>
      </ImageBackground>
    );
  }  
}
/**CIERRE REGISTER */
export default Register;

//Estilos REGISTER
const stylesRegistro = StyleSheet.create({
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
      marginTop:5,
      marginBottom:5
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
      fontSize: 30,
      fontWeight: '500',
      marginTop: 10,
      marginBottom:10,
      opacity: 0.9,
      fontFamily: 'sans-serif-light'
    },
    logoSubText:
    {
      color: 'white',
      fontSize: 20,
      fontWeight: '500',
      marginTop: 10,
      marginBottom:10,
      opacity: 0.9,
      fontFamily: 'sans-serif-thin'
    },
    logo:
    {
      width:130,
      height:130,
      marginBottom:-10,
      marginTop:-20
    },
    input:
    {
      width: WIDTH -55,
      height:45,
      borderRadius: 15,
      fontSize:17.5,
      paddingLeft: 45,
      backgroundColor: 'rgba(0,0,0,0.5)',
      color: 'rgb(255,255,255)',
      marginHorizontal: 25,
      fontFamily:'sans-serif-thin'
  
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
  /**Cierre Register */