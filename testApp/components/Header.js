import React from 'react';
import {StyleSheet, View, Text, FlatList, Alert} from 'react-native';

const Header = () => {
  return (
    <View style={styles.Header}>
      <Text style={styles.Text}>Shopping List</Text>
    </View>
  );
};
const styles = StyleSheet.create({
  Header: {height: 100, padding: 15, backgroundColor: '#03A9F4'},
  Text: {textAlign: 'center', color: 'white', fontSize: 20, marginTop: 40},
});
export default Header;
