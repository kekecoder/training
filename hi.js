function getTaxCalculator(incomeNotTaxed) {

 // your code here (approximately 10 lines)
    if (incomeNotTaxed < 100) {
        return incomeNotTaxed/10
    }
}

// THIS IS FOR YOUR TESTING ONLY.
const calculateTax = getTaxCalculator(30000)
console.log(calculateTax(100000)) // should print 70000
console.log(calculateTax(350000)) // should print 64000
console.log(calculateTax(600000)) // should print 171000