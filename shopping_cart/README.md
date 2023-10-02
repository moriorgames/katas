# Shopping cart

## What do we want to build?

We are building a shopping cart for an online grocery shop. The idea of this kata is to build the product in an
iterative way.

## Technical requirements

- The price per unit is calculated based on the product cost and the percentage of revenue that the company wants for
  that product.
- The price has to be rounded up; so if a price per unit calculated is 1.7825, then the expected price per unit for that
  product is 1.79
- The final price of the product is then calculated as the price per unit with the VAT rounded up.
- Products are not allowed to have the same name.

## List of products

| Name       | Cost   | % Revenue | Price per unit | Tax                   | Final price |
|------------|--------|-----------|----------------|-----------------------|-------------|
| Iceberg 🥬 | 1.55 € | 15 %      | 1,79 €         | Normal (21%)          | 2.17 €      |
| Tomato 🍅  | 0.52 € | 15 %      | 0.60 €         | Normal (21%)          | 0.73 €      |
| Chicken 🍗 | 1.34 € | 12 %      | 1.51 €         | Normal (21%)          | 1.83 €      |
| Bread 🍞   | 0.71 € | 12 %      | 0.80 €         | First necessity (10%) | 0.88 €      |
| Corn 🌽    | 1.21 € | 12 %      | 1.36 €         | First necessity (10%) | 1.50 €      |

