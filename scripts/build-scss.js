const fs = require("fs");
const path = require("path");
const data = require("../src/data.json");

fs.writeFileSync(
  path.resolve(__dirname, "../src/scss/_logos-generated.scss"),
  `$logos: ${data.brands.map(brand => brand.id).join(" ")};`
);
