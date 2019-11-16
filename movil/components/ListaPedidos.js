import React, {Component} from 'react';
//import Icon from 'react-native-vector-icons/Ionicons';
import { Button } from 'react-native-elements';
import Icon from 'react-native-vector-icons/FontAwesome5';
import {
  StyleSheet,
  View,
  Text,
  ImageBackground,
  Dimensions,
  Modal
} from 'react-native';
import Products from './ProductosPedidos'
const { width: WIDTH } = Dimensions.get('window');

const ListaPedidos = ({key,prods,idCliente,CancelarPedido, ConfirmarEntrega}) => 
(
    <View>
        {prods.map(prods =>
            <Products
              key={prods.id}
              nombre={prods.title}
              precio={prods.price}
              desc={prods.desc}
              status={prods.status}
              idCliente={idCliente}
              CancelarPedido={() => CancelarPedido(prods.id)}
              ConfirmarEntrega={ ()=>ConfirmarEntrega(prods.id) }
            />
          )}
    </View>
);
export default ListaPedidos;