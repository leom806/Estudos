
arg = ARGV.first.to_s

if arg == ""
	puts("\t4GL - Script Generator v1.0")
	exit(0)
end

lines = open(arg).readlines
output = open("out.src", "w")
current_action  = ""

# Core
lines.each do |line|

	if current_action != ""
		if line.match(/end\n?/i)
			output << "Return\n\n"
			current_action = ""
			next
		end
	end

	array = line.split
	tab = ""
	if current_action != "" then tab="\t" end

	if line.match(/^#.*/)
		output << line
	elsif line.match(/open\s\w+/i)
		if array.size == 2
			output << "\tIf !clalev([F:#{array[1].upcase}]) : Local File #{array[1].upcase}    [#{array[1].upcase}] : Endif\n"
		else
			output << "\tIf !clalev([F:#{array[1].upcase}]) : Local File #{array[2].upcase}    [#{array[1].upcase}] : Endif\n"
		end
	elsif line.match(/actions\s/i)
		output << "$ACTION\n"
		output << "\tCase ACTION\n"		
		array.size.times do |i|		
			if(i>0)
				output << "\t\tWhen \"#{array[i].upcase}\" : Gosub #{array[i].upcase}\n"
			end
		end
		output << "\t\tWhen Default\n"
		output << "\tEndcase\n"
		output << "Return\n\n\n"		
	elsif line.match(/action\s\w+/i) 
		current_action = array[1].upcase
		output << "$#{array[1].upcase}\n"
	elsif line.match(/refresh.*/i)
		array.size.times do |i|		
			if(i>0)
				output << "\tAffzo [M:#{array[i].upcase}]\n"
			end
		end
	elsif line.match(/clean.*/i)
		array.size.times do |i|		
			if(i>0)
				output << "\tEffzo [M:#{array[i].upcase}]\n"
			end
		end
	elsif line.match(/raz.*/i)
		array.size.times do |i|		
			if(i>0)
				output << "\tRaz [M:#{array[i].upcase}]\n"
			end
		end
	elsif line.match(/gosub\s\w+/i)
		output << "#{tab}Gosub #{array[1].upcase}\n"
	# 
	# VARIAVEIS
	#
	elsif line.match(/.*string.*=.*/i)
		name, content = line.match(/string\s(.*)\s=\s(".*")/i).captures
		name = name.upcase.delete(' ')		
		if array[0].downcase == "global"
			output << "#{tab}Global Char #{name}(100) : #{name} = #{content}\n"
		else
			output << "#{tab}Local Char #{name}(100) : #{name} = #{content}\n"
		end
	elsif line.match(/.*int.*=.*/i)		
		name, content = line.match(/.*int\s(.*)=\s(\d+)/i).captures
		if array[0].downcase == "global"
			output << "#{tab}Global Integer #{name} : #{name} = #{content}\n"
		else
			output << "#{tab}Local Integer #{name} : #{name} = #{content}\n"
		end
	elsif line.match(/.*double.*=.*/i)		
		name, content = line.match(/.*double\s(.*)=\s(.*)/i).captures
		name = name.upcase.delete(' ')
		if array[0].downcase == "global"
			output << "#{tab}Global Decimal #{name} : #{name} = #{content}\n"
		else
			output << "#{tab}Local Decimal #{name} : #{name} = #{content}\n"
		end
	#
	# FILTER
	#
	elsif line.match(/filter\s\w+\s.*/i)
		table, condition = line.match(/filter\s(\w+)\s(.*)/i).captures
		if condition != ""
			output << "#{tab}Filter #{table} Where #{condition}\n"
		else
			output << "#{tab}Filter #{table}\n"
		end
	else 
		output << line
	end
end