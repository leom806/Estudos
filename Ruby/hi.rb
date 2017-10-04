saudation = ["Olá", "Oi", "Hello", "Hi", "Ooi"]
names = []
ARGV.each { |arg| names << if arg.size > 2 then arg[0].upcase + arg[1..-1] else arg end }
print "#{saudation[rand(saudation.size)]}," ; names.each { |n| print " #{n}"} ; print "!\n"