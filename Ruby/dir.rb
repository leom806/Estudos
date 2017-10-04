files = Dir.entries('C:/').select{ |r| !File.directory? r };
maior = 0

files.each do |f|
	if maior < f.size
		maior = f.size
	end
end

files.each do |f|
	puts "#{f.ljust(maior+5)} "
	subs = Dir.entries('C:/#{f.to_s}').select{ |r| !File.directory? r };
	subs.each do |s|
		puts "\t #{s}"
	end
end
