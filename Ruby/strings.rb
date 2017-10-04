myname = "leonardo momente"

puts myname.capitalize
puts myname.upcase
puts myname.downcase
puts myname.reverse
puts myname.length
puts myname[5..8]

myname.split(' ').each do |word|
	print word.capitalize+" "
end
puts

puts myname[9..myname.length].capitalize

#$end
puts puts puts

rock = "Mary Kate Olson Lindsay Lohan Charlie Sheen"

puts rock.split

date = "11/17/2013"
puts date.split("/")

#$end

def show(*args)
	args.each do |arg|
		print "#{arg} "
	end
	puts
end

show date.split("/")[0], date.split("/")[1], date.split("/")[2]

array = ["oi", "eu", "leo", 7, 7+1]

show array[8]=1