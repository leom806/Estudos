user = ARGV.first

puts "Hi #{user}!"

prompt = "> "

print "Tell me where do you live! xD\n", prompt
lives = $stdin.gets.chomp

print "So, what do you think about living in #{lives}?\n", prompt
answer = $stdin.gets.chomp

puts """
I am not so sure if I got it right but seems \nto be a good place to live, right?
"""