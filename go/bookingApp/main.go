package main

import (
	"fmt"
	"strings"
)




func main() {

	myAge := "i am 24 years old"
	const totaltiket = 50
	var avalabeltiket uint = 50

	var bookings []string

	fmt.Print("hi chamod kohomda i am ", myAge, "i am good for nice")
	fmt.Printf("\nwe have %v and still avalbel %v", totaltiket, avalabeltiket)

	for {
		var fname string
		var lname string
		var email string
		var usertiket uint

		fmt.Println("enter your first name:")
		fmt.Scan(&fname)

		fmt.Println("enter your last name:")
		fmt.Scan(&lname)

		fmt.Println("enter your email name:")
		fmt.Scan(&email)

		fmt.Println("enter your need tiket:")
		fmt.Scan(&usertiket)

		if usertiket <= avalabeltiket {

			avalabeltiket = avalabeltiket - usertiket
			bookings = append(bookings, fname+" "+lname)

			fmt.Printf("all of the arry %v\n", bookings)
			fmt.Printf("1 value of the arry %v\n", bookings[0])
			fmt.Printf("1 value of the arry %v\n", len(bookings))

			fmt.Printf("your name is %v %v and you book %v tiket and youn  comformation email sent to the %v ", fname, lname, email, usertiket)
			fmt.Printf("now avalabel tiket is : %v", avalabeltiket)

			firstnames1 := []string{}
			for _, booking := range bookings {
				var names = strings.Fields(booking)

				firstnames1 = append(firstnames1, names[0])
			}

			fmt.Printf("this is the first name s %v", firstnames1)

			var notiket bool = avalabeltiket == 0
			if notiket {
				fmt.Printf("application is stop")
				break
			}
		} else {
			fmt.Printf("we only have a %v tiker you can not book %v tikket ", avalabeltiket, usertiket)
			continue
		}

	}

}
