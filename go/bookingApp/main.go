package main

import "fmt"

func main() {

	myAge := "i am 24 years old"
	const totaltiket = 50
	var avalabeltiket uint = 50

	var bookings []string

	fmt.Print("hi chamod kohomda i am ", myAge, "i am good for nice")
	fmt.Printf("\nwe have %v and still avalbel %v", totaltiket, avalabeltiket)

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

	avalabeltiket = avalabeltiket - usertiket
	bookings = append(bookings, fname+" "+lname)

	fmt.Printf("all of the arry %v\n", bookings)
	fmt.Printf("1 value of the arry %v\n", bookings[0])
	fmt.Printf("1 value of the arry %v\n", len(bookings))

	fmt.Printf("your name is %v %v and you book %v tiket and youn  comformation email sent to the %v ", fname, lname, email, usertiket)
	fmt.Printf("now avalabel tiket is : %v", avalabeltiket)

	fmt.Printf("this is the full booking %v", bookings)
}
