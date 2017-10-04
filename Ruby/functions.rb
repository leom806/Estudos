require "colorize"

def print_all(current_file)
	size = current_file.readlines.size
	rewind(current_file)
	size.times do |index|
		puts "#{(index.+1).to_s.ljust(2)}: "+current_file.gets.chomp.yellow
	end
end

def rewind(current_file)
	current_file.seek(0)
end

def print_line(current_line, current_file)
	puts "Linha #{current_line}: "+current_file.gets.chomp
end

def print_lines(current_file, n_lines)
	rewind(current_file)
	puts
	if n_lines > current_file.readlines.size
		rewind(current_file)
		puts "More lines than actually there is on this file xD, gonna print all\n".blue
		print_all(current_file)
		return
	end
	rewind(current_file)
	n_lines.times do |line|
		puts "#{(line.+1).to_s.ljust(2)}: "+current_file.gets.chomp.red
	end
end

first, second = ARGV
f = open(first.to_s)
line = 0

rewind(f)

if second.to_s == ""
	puts "How many lines do you wanna see?"
	print_lines(f, $stdin.gets.chomp.to_i)
else
	print_lines(f, second.to_i)
end
