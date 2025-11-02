import React from "react";

const ProductInfo = () => {
  const product = {
    name: "lap top",
    price: "$3000",
  };
  return (
    <div>
      <h1>product detalis</h1>
      <p>{product.name}</p>
      <p>{product.price}</p>
    </div>
  );
};

export default ProductInfo;
