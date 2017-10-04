module Token

	def Token.get(file)
		return file.gets
	end

end

require "./module.rb"

if (ARGV.first.to_s!="") then
	file = open(ARGV.first.to_s)
	string = Token.get(file)
	string = string.split('\n')
	string.each do |token|
		print(" #{token.gsub '.',' '} ")
	end
end
