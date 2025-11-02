import React from 'react'
import Header from './components/Header'
import Main from './components/Main'
import Footer from './components/Footer'
import Grade from './components/Grade'
import ProductInfo from './components/ProductInfo'
import ProductList from './components/ProductList'
import Person from './components/Person'
import Card from './components/Card'
import Wather from './components/Wather'
import UseStatus from './components/UseStatus'

const App = () => {
  return (
    <div>
      <Header/>
      <Main/>
      <Grade/>
      <ProductInfo/>
      <ProductList/>
      <Person name='chamod mullegama' age={33}/>
      <Card>
          <h1>card 1</h1>
      </Card>
      <Card>
          <h1>card 2</h1>
      </Card>
      <Card>
          <h1>card 3</h1>
      </Card>
      <Wather/>
      <UseStatus islog={true} isadmin={true}/>
      <Footer/>
    </div>
  )
}

export default App