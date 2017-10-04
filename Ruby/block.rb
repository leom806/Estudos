
def run_(a)
	puts a
	yield(a) if block_given?
end

def run(a, &b)
	puts a
	b.call
end

run (:oi) { puts "OI" }
puts
run_ (:oi2) { |arg| puts "#{arg}" }
puts
run_ (:OI) { puts "oi" }