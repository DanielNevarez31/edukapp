import React, {Component} from 'react';
//import Icon from 'react-native-vector-icons/Ionicons';
import { Button , Divider} from 'react-native-elements';
import Icon from 'react-native-vector-icons/FontAwesome5';
import {
  StyleSheet,
  View,
  Text,
  ImageBackground,
  Dimensions,
  TouchableOpacity
} from 'react-native';
const { width: WIDTH } = Dimensions.get('window');

const ProductosPedidos = ({id,nombre, precio, inventario, desc ,status, idCliente, CancelarPedido,ConfirmarEntrega}) => 
(
    <View style={styleProds.mainView}>
        <View>
            <Text style={styleProds.textName}>
                <Icon name="signature" style={styleProds.iconProds} size={20} color={'rgba(0,0,0,9)'}></Icon>Combo: {nombre}
            </Text>
        </View>
        <View>
            <Text style={styleProds.textProds}>
                <Icon name="dollar-sign" style={styleProds.iconProds} size={20} color={'rgba(0,0,0,9)'}></Icon>Precio: ${precio}
            </Text>
        </View>
        <View style={ {alignItems:'center'} }>
            <Text style={styleProds.textProds}>
                <Icon name="file-signature" style={styleProds.iconProds} size={20} color={'rgba(0,0,0,9)'}></Icon>Descripción:
            </Text>
            <Text style={styleProds.textProds} style={ {textAlign:'center'} }>
                {desc}
            </Text>
        </View>
        <Divider style={{ backgroundColor: 'black' ,height:10}} />
        
        
        <View style={ {marginBottom:6} }>
        {status ? 
        <View>
            <TouchableOpacity style={styleProds.btnPedinRoad}>
                <Text style={styleProds.textBtn} >En camino</Text>
                <Icon style={styleProds.registroIco} name={"motorcycle"} size={26} color={'rgb(0,0,0)'}></Icon>
            </TouchableOpacity>
        </View> : <View>
            <TouchableOpacity style={styleProds.btnPedBeing}>
                <Text style={styleProds.textBtn} >Siendo preparado</Text>
                <Icon style={styleProds.registroIco}  name={"utensils"} size={26} color={'rgb(0,0,0)'}></Icon>
            </TouchableOpacity>
        </View>}
        </View>
        {status ?
        <Button
        icon={
            <Icon
            name="check-circle"
            size={15}
            color="white"
            style={{marginLeft:10}}
            />
        }
        buttonStyle={{backgroundColor: 'blue'}}
        iconRight
        title="Confirmar pedido"
        onPress={ConfirmarEntrega}
        />
        
        :
        <Button
        icon={
            <Icon
            name="window-close"
            size={15}
            color="white"
            style={{marginLeft:10}}
            />
        }
        buttonStyle={{backgroundColor: 'red'}}
        iconRight
        title="Cancelar pedido"
        onPress={CancelarPedido}
        />
        }
        
    </View>
);

const styleProds = StyleSheet.create({
    textBtn:{
        color: 'black',
        fontSize:17.5,
        textAlign: 'center',
        marginTop:7,
        
    },
    registroIco:{
        position: 'absolute',    
        top:7,
        left:190
      },
    btnPedinRoad:{
        width: WIDTH -185,
        height:40,
        borderRadius: 5,
        fontSize:18,
        marginTop: 10,
        backgroundColor:'#51A155'
      },
      btnPedBeing:{
        width: WIDTH -185,
        height:40,
        borderRadius: 5,
        fontSize:18,
        marginTop: 10,
        backgroundColor:'#F8BA66'
      },
    mainView: 
    {
        backgroundColor: '#FFECDC',
        marginBottom:10,
        borderRadius:15,
        height:240,
        width:350,
        alignItems:'center',
        paddingTop:6,
        
    },
    textProds:
    {
        fontSize:14
    },
    textName:
    {
        fontSize:18
    },
    iconProds:
    {
        marginRight:20,
        marginLeft:20,
        position: 'absolute'
    }
});
export default ProductosPedidos;