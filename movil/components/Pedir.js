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
import { Header } from 'react-native-elements';
import Lista from './Lista';


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
    this.ref = firebase.firestore().collection('products');
    this.unsubscribe = null;
    this.state = 
    {
      products:[],
      idCliente: '',
      title:'',
      desc:'',
      price:'',
      nombre:'',
      dirección:'',
      telefono:'',
      email:''
    }
  }

  RealizarPedido = (idProd) =>
  {
    t = '';
    d = '';
    p = '';
    n = '';
    tel = '';
    em = '';
    dir = '';
    var cantidad = 0;
    const {idCliente} = this.state;  
    const { navigate } = this.props.navigation;

      var docRef = this.ref.doc(idProd).get();
      docRef.then(function(doc) 
      {
        console.log("Cached document data:", doc.data());
        t = doc.data().title;
        d = doc.data().desc;
        p = doc.data().price;

        firebase.firestore().collection('clientes').doc(idCliente).get().then(function(doc) 
          {
            console.log("Cached document data:", doc.data());
            n = doc.data().nombre;
            tel = doc.data().telefono;
            em = doc.data().email;
            dir = doc.data().direccion;

            firebase.firestore().collection('pedidos').add({
                idProd: idProd,
                idCliente: idCliente,
                status:false,
                title:t,
                price:p,
                desc:d,
                nombre:n,
                direccion: dir,
                telefono: tel,
                email:em
              }).then((docRef) => 
              {
                //this._isMounted = true;
                Alert.alert("¡Éxito!",'¡Su pedido se ha completado con éxito! Tiempo de espera: 30 minutos.');
                
              })
              .catch((error) => {
                console.error("Error adding document: ", error);
                Alert.alert("¡Atención!",'Algo salió mal. Inténtelo de nuevo.');
              });

              docRef = firebase.firestore().collection('products').doc(idProd).get();
              docRef.then(function(doc) 
              {
                console.log("Cached document data:", doc.data());
                cantidad = doc.data().inventary;
                cantidad--;
                firebase.firestore().collection('products').doc(idProd).update({inventary:cantidad});
                //componentDidMount;
              }).catch(function(error) {
                console.log("Error getting cached document:", error);
              });
          }).catch(function(error) {
            console.log("Error getting cached document:", error);
          });


        
        //firebase.firestore().collection('products').doc(idProd).update({inventary:cantidad});
        //componentDidMount;
      }).catch(function(error) {
        console.log("Error getting cached document:", error);
      });
    
    


  }

  HacerPedido = (idProd) =>
  {
    Alert.alert(
        'Confirmar pedido',
        '¿Desea pedir este combo a la dirección registrada en su cuenta?',
        [
          {
            text: 'Cancelar',
            onPress: () => console.log('Cancel Pressed'),
            style: 'cancel',
          },
          {text: 'Realizar pedido', onPress: () => this.RealizarPedido(idProd)},
        ],
        {cancelable: false},
      );
  }
  onCollectionUpdate = (querySnapshot) => {
    const products = [];
    querySnapshot.forEach((doc) => {
      const { key, title, inventary, price,desc } = doc.data();
      products.push({
        id: doc.id,
        doc, // DocumentSnapshot
        title,
        inventary,
        price,
        desc
      });
    });
    this.setState({ products });
    //console.log(this.state.products);
  }

  componentDidMount()
  {
    const {navigation} = this.props;
    const idCliente = navigation.getParam('id');
    this.setState({idCliente});
    this.unsubscribe = this.ref.onSnapshot(this.onCollectionUpdate);
    const products = [];
    const prodRef = firebase.firestore().collection('products');
    prodRef.where("inventary" , ">" , 0).get()
    .then(snapshot => {
      snapshot.forEach(doc =>{
        const { key, title, inventary, price ,desc} = doc.data();
        products.push({
          id: doc.id,
          doc, // DocumentSnapshot
          title,
          inventary,
          price,
          desc
        });
      });
      this.setState({ products });
    })
    .catch(err =>
    {
      console.log('Error getting documents', err);
    });
  }  
  static navigationOptions = ({ navigation }) => {
    return {
      title: 'Hacer pedido',
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
    const {navigation} = this.props;
    const idCliente = navigation.getParam('id');
    //this.setState({idCliente});
    return (
      <View style={stylesWelcome.backgroundImage}>
        <View>
          <Text style={stylesWelcome.textWelcome}>Lista de combos</Text>
        </View>
        <ScrollView style={stylesWelcome.Scroll}>
          <Lista key={this.state.products.id} prods={this.state.products} id={idCliente} HacerPedido={this.HacerPedido}/>
        </ScrollView>
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
      margin:20,
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