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
  Modal
} from 'react-native';
const { width: WIDTH } = Dimensions.get('window');

const Products = ({id,nombre, precio, inventario, desc , idCliente, HacerPedido}) => 
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
        <View>
            <Text style={styleProds.textProds}>
                <Icon name="list" style={styleProds.iconProds} size={20} color={'rgba(0,0,0,9)'}></Icon>Existencia: {inventario}
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
        <Button
            icon={
                <Icon
                name="check-double"
                size={15}
                color="white"
                style={{marginLeft:10}}
                />
            }
            iconRight
            title="Pedir este combo"
            onPress={HacerPedido}
            />
    </View>
);

const styleProds = StyleSheet.create({
    mainView: 
    {
        backgroundColor: '#FFECDC',
        marginBottom:10,
        borderRadius:15,
        height:210,
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
export default Products;