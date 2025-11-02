import React from 'react'

const ProductList = () => {

    const product=[
        {id:1,name:'lap',price:'1500'},
        {id:2,name:'phone',price:'15000'},
        {id:3,name:'jug',price:'150'}
    ]
    
  return (
    <div>
      {product.map((p) => {
        return (
          <div key={p.id}>
            <ul>
              <li>{p.name}</li>
              <li>${p.price}</li>
            </ul>
          </div>
        )
      })}
    </div>
  )
}

export default ProductList