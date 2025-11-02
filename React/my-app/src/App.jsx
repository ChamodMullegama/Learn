import React from 'react'
import Header from './components/Header'
import Main from './components/Main'
import Footer from './components/Footer'
import Grade from './components/Grade'
import ProductInfo from './components/ProductInfo'
import ProductList from './components/ProductList'

const App = () => {
  return (
    <div>
      <Header/>
      <Main/>
      <Grade/>
      <ProductInfo/>
      <ProductList/>
      <Footer/>
    </div>
  )
}

export default App