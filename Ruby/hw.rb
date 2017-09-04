
first, second = ARGV

puts %q{
	#{first}
	#{second}
}

formatter = "%{f1}"

puts formatter % {f1:"#{second}"}
puts "#{first}"

print "Qual a sua idade? "
#height = gets.chomp.to_i
