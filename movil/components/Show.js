import React, {Component} from 'react';
import {createStackNavigator, createAppContainer, NavigationEvents, createDrawerNavigator} from 'react-navigation';
import {
  StyleSheet,
  View,
  Text,
  ImageBackground,
  Dimensions,
} from 'react-native';
import Products from './Products'
const { width: WIDTH } = Dimensions.get('window');
const Show = ({prods}) =>
(
    <View>
        {prods.map((prod) =>
            <Products
                key={prod.id}
                nombre={prod.title}
                precio={prod.price}
                inventario={prod.inventary}
                desc={prod.desc}
            />
        )}
    </View>
);

export default Show;