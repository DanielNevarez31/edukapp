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
import bgImage from '../images/3.jpg';

/**Clase REGISTER */
class Cambiar extends Component
{
  constructor(props)
  {
    super(props);  
    this.unsubscribe = null;
    this.state = 
    {
      showPass : true,
      press : false,
      email:'',
      ps:'',
      nombre: '',
      telefono:'',
      direccion:'',
    }
  }
  
  
  componentDidMount()
  {
    const {navigation} = this.props;
    const nombre = navigation.getParam('nombre');
    console.log(nombre);
    const idCliente = navigation.getParam('id');
    const direccion = navigation.getParam('direccion');
    const telefono = navigation.getParam('telefono');
    const email = navigation.getParam('email');
    const ps = navigation.getParam('ps');
    this.setState({nombre:nombre,direccion:direccion,telefono:telefono,email:email,ps:ps});
  }
  HacerCambio = (idCliente) =>
  {
    const {nombre,direccion,telefono,ps,email} = this.state;
    const { navigate } = this.props.navigation;
    firebase.firestore().collection('clientes').doc(idCliente).update({nombre:nombre,direccion:direccion,telefono,telefono,email:email,ps:ps});
    Alert.alert("Listo!",
      "Los cambios se han guardado.");
    
    navigate('WelcomeWindow',{name:nombre,id:idCliente,direccion:direccion,telefono:telefono,email:email,ps:ps});

  }
  Login = () => 
  {
    const {navigation} = this.props;
    const idCliente = navigation.getParam('id');
    const {nombre,direccion,telefono,ps,email} = this.state;
    if(email=='' || ps=='' || direccion == '' || nombre=='' || telefono=='')
    {
      Alert.alert("¡Atención!",
      "Para terminar el registro, llene todos los campos.");
    }
    else
    {
        Alert.alert(
            'Confirmar cambio',
            '¿Desea cambiar los datos de su cuenta?',
            [
              {
                text: 'Cancelar',
                onPress: () => console.log('Cancel Pressed'),
                style: 'cancel',
              },
              {text: 'Realizar cambio', onPress: () => this.HacerCambio(idCliente)},
            ],
            {cancelable: false},
          );
      
    }
  }

  static navigationOptions = ({ navigation }) => {
    return {
      title: 'Subir evidencias',
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
    
    return (
      <ImageBackground  style={stylesCambiar.backgroundContainer}>
        <View style={stylesCambiar.logoContainer} >
            <Image source={logo} style={stylesCambiar.logo}></Image>
          <Text style={stylesCambiar.logoText}>Evidencias de asistencia</Text>      
        </View>

        <View style={stylesCambiar.inputContainter}>
          <Icon 
          style={stylesCambiar.inputIcon}
          name="ios-person" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          style={stylesCambiar.input}
          placeholder={'Nombre completo'} 
          onChangeText={nombre => this.setState({nombre})}
          returnKeyType={"next"}
          keyboardType={"default"}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          value={this.state.nombre}
          onSubmitEditing={(event) => {this.refs.SecondInput.focus();}}
          underlineColorAndroid='transparent'></TextInput>
        </View>

        <View style={stylesCambiar.inputContainter}>
          <Icon 
          style={stylesCambiar.inputIcon}
          name="ios-pin" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          ref='SecondInput'
          style={stylesCambiar.input}
          placeholder={'Dirección'} 
          onChangeText={direccion => this.setState({direccion})}
          value={this.state.direccion}
          returnKeyType={"next"}
          keyboardType={"default"}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          onSubmitEditing={(event) => {this.refs.ThirdInput.focus();}}
          underlineColorAndroid='transparent'></TextInput>
        </View>

        <View style={stylesCambiar.inputContainter}>
          <Icon 
          style={stylesCambiar.inputIcon}
          name="ios-call" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          ref='ThirdInput'
          style={stylesCambiar.input}
          placeholder={'Teléfono'} 
          onChangeText={telefono => this.setState({telefono})}
          value={this.state.telefono}
          returnKeyType={"next"}
          keyboardType={"numeric"}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          onSubmitEditing={(event) => {this.refs.ForthInput.focus();}}
          underlineColorAndroid='transparent'></TextInput>
        </View>

        <View style={stylesCambiar.inputContainter}>
          <Icon 
          style={stylesCambiar.inputIcon}
          name="ios-mail" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          ref='ForthInput'
          style={stylesCambiar.input}
          placeholder={'Email'} 
          onChangeText={email => this.setState({email})}
          value={this.state.email}
          returnKeyType={"next"}
          keyboardType={"email-address"}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          onSubmitEditing={(event) => {this.refs.FifthInput.focus();}}
          underlineColorAndroid='transparent'></TextInput>
        </View>


        <View style={stylesCambiar.inputContainter}>
          <Icon 
          style={stylesCambiar.inputIcon}
          name="ios-lock" 
          size={28} 
          color={'rgba(255,255,255,0.7)'}></Icon>
          <TextInput 
          ref='FifthInput'
          keyboardType={"numeric"}
          returnKeyType={"done"}
          style={stylesCambiar.input}
          onChangeText={ps => this.setState({ps})}
          value={this.state.ps}
          placeholder={'Contraseña'} 
          secureTextEntry={this.state.showPass}
          placeholderTextColor={'rgba(255,255,255,0.5)'}
          underlineColorAndroid='transparent'></TextInput>
          <TouchableOpacity style={stylesCambiar.bntEye}
            onPress={this.showPass.bind(this)}>
            <Icon name={this.state.press == false ? "ios-eye" : "ios-eye-off"} size={26} color={'rgba(255,255,255,0.7)'}></Icon>
          </TouchableOpacity>
        </View>
        
        <TouchableOpacity style={stylesCambiar.btnLogin}
          onPress={this.Login}>
          <Text style={stylesCambiar.text}>Guardar cambios</Text>
          <Icon style={stylesCambiar.loginIco} name="ios-save" size={26} color={'rgb(255,255,255)'}></Icon>

        </TouchableOpacity>
      </ImageBackground>
    );
  }  
}
/**CIERRE REGISTER */
export default Cambiar;

//Estilos REGISTER
const stylesCambiar = StyleSheet.create({
    bntEye:{
      position: 'absolute',    
      top:7,
      right:37
  
    },
    loginIco:{
      position: 'absolute',    
      top:7,
      right:80
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
      fontSize: 15,
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