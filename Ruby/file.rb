filename = ARGV.first ; txt = open(filename, 'a+')

#txt.truncate(0)
txt.write("\nstuff\nstuff2\n")
txt.close

txt = open(filename, 'r')
puts txt.read
#puts txt.read

txt.close
