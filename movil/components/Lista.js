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
import Products from './Products'
const { width: WIDTH } = Dimensions.get('window');

const Lista = ({key,prods,idCliente,HacerPedido}) => 
(
    <View>
        {prods.map(prods =>
            <Products
              key={prods.id}
              nombre={prods.title}
              precio={prods.price}
              inventario={prods.inventary}
              desc={prods.desc}
              idCliente={idCliente}
              HacerPedido={() => HacerPedido(prods.id)}
            />
          )}
    </View>
);
export default Lista;